<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectLikeFactory extends Factory
{
    protected $model = \App\Models\ProjectLike::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ip' => $this->faker->ipv4(),
            'useragent' => $this->faker->userAgent(),
            'hash' => sha1($this->faker->name()),
            'element_id' => 5
        ];
    }
}
