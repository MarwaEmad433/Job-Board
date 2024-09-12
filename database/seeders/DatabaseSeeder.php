<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
use App\Models\Application;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // إنشاء بيانات للتاج
        $tags = Tag::factory(10)->create();

        // إنشاء بيانات للمستخدمين
        User::factory(20)->create()->each(function($user) use($tags) {
            // إنشاء بيانات للإعلانات المرتبطة بالمستخدم
            Listing::factory(rand(1, 4))->create([
                'user_id' => $user->id
            ])->each(function($listing) use($tags) {
                // ربط الإعلانات بالتاج
                $listing->tags()->attach($tags->random(2));
            });
        });

        // إنشاء بيانات لتطبيقات التوظيف
        Application::factory(30)->create(); // يمكن تعديل العدد حسب الحاجة
    }
}
