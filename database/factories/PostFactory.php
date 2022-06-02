<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'      => $this->faker->sentence,
            'image'     => $this->faker->image(storage_path('app/images'),640,480, null, false),
            'user_id'   => User::inRandomOrder()->first()->id, // @TODO Make sure the user exists
        ];
    }
}
