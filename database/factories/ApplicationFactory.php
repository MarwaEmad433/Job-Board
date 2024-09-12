<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'listing_id' => Listing::factory(), // ربط التقديم بنموذج Listing
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'resume' => $this->faker->file('public/storage/resumes', 'public/resumes', false), // مسار السيرة الذاتية
        ];
    }
}
