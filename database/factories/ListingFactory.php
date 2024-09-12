<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(5, 7)); // عنوان الإعلان
        $datetime = $this->faker->dateTimeBetween('-1 month', 'now'); // تاريخ ووقت الإعلان

        $content = '';
        for ($i = 0; $i < 5; $i++) {
            $content .= '<p class="mb-4">' . $this->faker->paragraphs(rand(3, 5), true) . '</p>'; // محتوى الإعلان
        }

        return [
            'user_id' => User::inRandomOrder()->first()->id, // تعيين user_id من بين المستخدمين العشوائيين
            'title' => $title,
            'slug' => Str::slug($title) . '-' . rand(1111, 9999), // عنوان URL فريد
            'company' => $this->faker->company, // اسم الشركة
            'location' => $this->faker->city, // الموقع
            'logo' => $this->faker->imageUrl(640, 480, 'business', true), // صورة شعار الشركة
            'is_highlighted' => (rand(1, 10) > 7), // هل الإعلان مميز؟
            'is_active' => true, // حالة الإعلان
            'content' => $content, // محتوى الإعلان
            'apply_link' => $this->faker->url, // رابط التقديم
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
