<?php

namespace App\Modules\Hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Hr\Models\TaxType;

class TaxTypeFactory extends Factory
{
    protected $model = TaxType::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->word(),
            'description' => $this->faker->optional()->sentence(),
            'editable' => 'Yes', // Assuming 'editable' is a string field, adjust as necessary
            // 'is_active'   => $this->faker->boolean(),
        ];
    }
}
