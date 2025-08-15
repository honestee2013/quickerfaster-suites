<?php

namespace App\Modules\Hr\Database\Factories;



use App\Modules\Hr\Models\Shift;
use Illuminate\Database\Eloquent\Factories\Factory;



use App\Modules\Hr\Models\PayrollRun;

class PayrollRunFactory extends Factory
{
    protected $model = PayrollRun::class;

    public function definition()
    {
        return [
            'payroll_number'     => $this->faker->unique()->numerify('PR-#####'),
            'title'              => $this->faker->sentence(3),
            'from_date'          => now()->startOfMonth()->toDateString(),
            'to_date'            => now()->startOfMonth()->addDays(2)->toDateString(),
            'status'             => 'draft',
            'payroll_components' => 'allowances, taxes',
            'attendance_options' => 'default',
            'created_by'         => null,
            'approved_by'        => null,
            'approved_at'        => null,
            'paid_by'            => null,
            'paid_at'            => null,
            'cancelled_by'       => null,
            'cancelled_at'       => null,
            'notes'              => null,
            'editable'           => 'Yes',
        ];
    }
}
