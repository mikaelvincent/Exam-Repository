<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\User::class;

    /**
     * Define the model's default state.
     * By default, create a guest user with a UUID.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => (string) Str::uuid(),
        ];
    }

    /**
     * Indicate that the user is registered.
     * Registered users do not have a UUID.
     *
     * @return static
     */
    public function registered()
    {
        return $this->state(fn (array $attributes) => [
            'uuid' => null,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
    }

    /**
     * Indicate that the user is a guest.
     * Guest users have a UUID.
     *
     * @return static
     */
    public function guest()
    {
        return $this->state(fn (array $attributes) => [
            'name' => null,
            'email' => null,
            'email_verified_at' => null,
            'password' => null,
            'remember_token' => null,
        ]);
    }
}
