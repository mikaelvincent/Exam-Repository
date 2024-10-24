<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HttpRequest>
 */
class HttpRequestFactory extends Factory
{
    protected $model = \App\Models\HttpRequest::class;

    public function definition()
    {
        $httpMethods = ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'HEAD', 'OPTIONS', 'TRACE', 'CONNECT'];

        return [
            'user_id' => User::factory(),
            'http_method' => $this->faker->randomElement($httpMethods),
            'path' => $this->faker->url(),
        ];
    }
}
