<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Foundation\Enums\Reaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   => User::inRandomOrder()->first()->id, // @TODO Make sure the user exists
            'post_id'   => Post::inRandomOrder()->first()->id, // @TODO Make sure the post exists
            'reaction'  => Reaction::REACTION_LIKE,
        ];
    }
}
