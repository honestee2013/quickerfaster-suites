<?php

namespace App\Modules\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;





class DailyEarningsSeeder extends Seeder
{
    public function run(): void
    {
        $employees = ['EMP001', 'EMP002', 'EMP003', 'EMP004'];

        foreach ($employees as $employee) {
            for ($i = 0; $i < 10; $i++) { // 10 random days
                $date = Carbon::now()->subDays(rand(0, 30))->toDateString();
                
                $regularHours = rand(6, 8);
                $overtimeHours = rand(0, 3);
                $totalHours = $regularHours + $overtimeHours;

                $regularRate = 2000; // example per hour
                $overtimeRate = 3000;

                $regularAmount = $regularHours * $regularRate;
                $overtimeAmount = $overtimeHours * $overtimeRate;
                $totalAmount = $regularAmount + $overtimeAmount;

                DB::table('daily_earnings')->insert([
                    'employee_id'      => $employee,
                    'work_date'        => $date,
                    'regular_hours'    => $regularHours,
                    'overtime_hours'   => $overtimeHours,
                    'total_hours'      => $totalHours,
                    'regular_amount'   => $regularAmount,
                    'overtime_amount'  => $overtimeAmount,
                    'total_amount'     => $totalAmount,
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);
            }
        }
    }
}
