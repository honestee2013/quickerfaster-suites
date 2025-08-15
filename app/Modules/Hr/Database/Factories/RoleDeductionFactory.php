<?php

namespace App\Modules\Hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Hr\Models\RoleDeduction;
use App\Modules\Hr\Models\PayrollRun;
use App\Modules\Access\Models\Role;
use App\Modules\Hr\Models\DeductionType;

class RoleDeductionFactory extends Factory
{
    protected $model = RoleDeduction::class;

    public function definition()
    {
        return [
            'payroll_run_id'    => PayrollRun::factory(),
            'role_id'           => Role::factory(),
            'deduction_type_id' => DeductionType::factory(),
            'amount'            => $this->faker->randomFloat(2, 10, 200),
            'subtraction_type'  => $this->faker->randomElement(['fixed', 'percentage']),
            'notes'             => $this->faker->optional()->sentence(),
        ];
    }
}
