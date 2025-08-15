<?php

namespace App\Modules\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



class AttendanceSessionsSeeder extends Seeder
{
    public function run()
    {
        $employees = ['EMP001', 'EMP002', 'EMP003', 'EMP004', 'EMP005'];
        $devices = ['DEV001', 'DEV002', 'DEV003'];

        foreach (range(1, 50) as $i) {
            $attendanceDate = Carbon::today()->subDays(rand(0, 30));
            
            // Simulate scheduled start/end
            $scheduledStart = Carbon::createFromTime(9, 0);
            $scheduledEnd   = Carbon::createFromTime(17, 0);

            // Simulate check in/out times
            $checkInTime  = (clone $scheduledStart)->addMinutes(rand(-15, 20));
            $checkOutTime = (clone $scheduledEnd)->addMinutes(rand(-20, 30));

            // Calculate status
            $checkInDiff  = $checkInTime->diffInMinutes($scheduledStart, false);
            $checkOutDiff = $checkOutTime->diffInMinutes($scheduledEnd, false);
            $sessionMinutes = $checkInTime->diffInMinutes($checkOutTime);

            DB::table('attendance_sessions')->insert([
                'attendance_date'    => $attendanceDate->toDateString(),
                'employee_id'        => $employees[array_rand($employees)],
                'check_in_time'      => $checkInTime->toTimeString(),
                'check_out_time'     => $checkOutTime->toTimeString(),
                'scheduled_start'    => $scheduledStart->toTimeString(),
                'scheduled_end'      => $scheduledEnd->toTimeString(),
                'check_in_status'    => $checkInDiff <= 0 ? 'On Time' : 'Late',
                'check_in_diff_mins' => $checkInDiff,
                'check_out_status'   => $checkOutDiff >= 0 ? 'On Time' : 'Early Leave',
                'check_out_diff_mins'=> $checkOutDiff,
                'session_minutes'    => $sessionMinutes,
                'device_id'          => $devices[array_rand($devices)],
                'latitude'           => rand(-90000000, 90000000) / 1000000,
                'longitude'          => rand(-180000000, 180000000) / 1000000,
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }
    }
}

