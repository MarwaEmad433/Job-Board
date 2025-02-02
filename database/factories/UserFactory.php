<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(), // اسم المستخدم
            'email' => $this->faker->unique()->safeEmail(), // البريد الإلكتروني الفريد
            'password' => bcrypt('password'), // تشفير كلمة المرور
            'remember_token' => Str::random(10), // رمز التذكر
        ];
    }
}
