<?php

namespace App\Modules\Hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Hr\Models\RoleBonus;
use App\Modules\Hr\Models\PayrollRun;
use App\Modules\Access\Models\Role;
use App\Modules\Hr\Models\BonusType;

class RoleBonusFactory extends Factory
{
    protected $model = RoleBonus::class;

    public function definition()
    {
        return [
            'payroll_run_id' => PayrollRun::factory(),
            'role_id'        => Role::factory(),
            'bonus_type_id'  => BonusType::factory(),
            'amount'         => $this->faker->randomFloat(2, 50, 500),
            'addition_type'  => $this->faker->randomElement(['fixed', 'percentage']),
            'notes'          => $this->faker->optional()->sentence(),
        ];
    }
}
