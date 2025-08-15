<?php

namespace App\Modules\Hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Hr\Models\DeductionType;

class DeductionTypeFactory extends Factory
{
    protected $model = DeductionType::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->word(),
            'description' => $this->faker->optional()->sentence(),
            // 'is_active'   => $this->faker->boolean(),
        ];
    }
}
