<?php

namespace App\Modules\Hr\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class SyncAttendanceBatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // adjust if you need auth
    }

    public function rules(): array
    {
        return [
            'attendances'                     => ['required', 'array'],
            'attendances.*.user_id'           => ['required', 'integer', 'exists:users,id'],
            'attendances.*.employee_id'       => ['required', 'string'],
            'attendances.*.attendance_date'   => ['required', 'date'],
            'attendances.*.check_in_time'     => ['nullable', 'date'],
            'attendances.*.check_out_time'    => ['nullable', 'date'],
            'attendances.*.device_id'         => ['nullable', 'string'],
            'attendances.*.device_name'       => ['nullable', 'string'],
            'attendances.*.location_name'     => ['nullable', 'string'],
            'attendances.*.timezone'          => ['nullable', 'string'],

            'attendances.*.latitude'          => ['nullable', 'numeric'],
            'attendances.*.longitude'         => ['nullable', 'numeric'],
            'attendances.*.sync_status'       => ['nullable', 'in:pending,synced,failed'],
            'attendances.*.notes'             => ['nullable', 'string'],
        ];
    }



    protected function prepareForValidation()
    {
        \Log::info("Raw input before validation", $this->all());

        // 1. Prefer explicit attendances key
        $records = $this->input('attendances');

        // 2. If not present, and top-level input looks like a list of records, treat it as attendances
        if (!$records && array_is_list($this->all())) {
            $records = $this->all();
        }

        if (!is_array($records)) {
            return;
        }

        $normalized = [];

        foreach ($records as $index => $record) {
            $normalized[$index] = [
                'user_id'         => $record['user_id'] ?? null,
                'employee_id'     => $record['employee_id'] ?? null,
                'attendance_date' => $this->normalizeDate($record['attendance_date'] ?? null, true),
                'check_in_time'   => $this->normalizeDate($record['check_in_time'] ?? null),
                'check_out_time'  => $this->normalizeDate($record['check_out_time'] ?? null),
                'device_id'       => $record['device_id'] ?? null,
                'device_name'     => $record['device_name'] ?? null,
                'location_name'   => $record['location_name'] ?? null,
                'timezone'        => $record['timezone'] ?? null,
                'latitude'        => $record['latitude'] ?? null,
                'longitude'       => $record['longitude'] ?? null,
                'sync_status'     => $record['sync_status'] ?? null,
                'notes'           => $record['notes'] ?? null,
            ];
        }

        $this->replace(['attendances' => $normalized]);
    }



private function normalizeDate($value, bool $forceDateOnly = false, ?string $deviceTz = null): ?string
{
    if ($value === null || $value === '') {
        return null;
    }

    try {
        $tz = $deviceTz ?: config('app.local_timezone', 'Africa/Lagos');

        if (is_numeric($value)) {
            $v = (int)$value;

            // Treat device timestamp as UTC, then shift into local TZ
            if ($v > 1_000_000_000_000) {
                $carbon = Carbon::createFromTimestampMsUTC($v)->setTimezone($tz);
            } else {
                $carbon = Carbon::createFromTimestampUTC($v)->setTimezone($tz);
            }
        } else {
            // String → respect offset if present, else assume UTC then shift
            if (preg_match('/[Z\+\-]\d{2}(:?\d{2})?$/', $value)) {
                $carbon = Carbon::parse($value)->setTimezone($tz);
            } else {
                $carbon = Carbon::parse($value, 'UTC')->setTimezone($tz);
            }
        }


        // Optional Always store in UTC
        // $carbon->setTimezone('UTC');

        return $forceDateOnly
            ? $carbon->toDateString()
            : $carbon->toDateTimeString();

    } catch (\Throwable $e) {
        \Log::warning('normalizeDate failed', [
            'value' => $value,
            'error' => $e->getMessage()
        ]);
        return null;
    }
}






    public function withValidator($validator)
    {
        $validator->after(function ($v) {
            foreach ($this->attendances ?? [] as $i => $record) {
                if (!empty($record['check_in_time']) && !empty($record['check_out_time'])) {
                    if ($record['check_out_time'] < $record['check_in_time']) {
                        $v->errors()->add("attendances.$i.check_out_time", 'Check out must be after check in.');
                    }
                }
            }
        });
    }


    public function messages(): array
{
    return [
        'attendances.*.check_out_time.after_or_equal' =>
            'Check-out must be after check-in for each record.',
    ];
}


// Log the validation failed message
protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
{
    \Log::error("Validation failed in SyncAttendanceBatchRequest", [
        'errors' => $validator->errors()->toArray(),
        'input'  => $this->all(),
    ]);

    parent::failedValidation($validator);
}





}
