<?php

namespace App\Modules\Hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Hr\Models\RoleAllowance;
use App\Modules\Hr\Models\PayrollRun;
use App\Modules\Access\Models\Role;
use App\Modules\Hr\Models\AllowanceType;

class RoleAllowanceFactory extends Factory
{
    protected $model = RoleAllowance::class;

    public function definition()
    {
        return [
            'payroll_run_id'    => PayrollRun::factory(),
            'role_id'           => Role::factory(),
            'allowance_type_id' => AllowanceType::factory(),
            'amount'            => $this->faker->randomFloat(2, 50, 500),
            'addition_type'     => $this->faker->randomElement(['fixed', 'percentage']),
            'notes'             => $this->faker->optional()->sentence(),
        ];
    }
}
