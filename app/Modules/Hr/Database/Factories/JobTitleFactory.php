<?php

namespace App\Modules\Hr\Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;





class JobTitleFactory  extends Factory
{

    protected $model = \App\Modules\Hr\Models\JobTitle::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
