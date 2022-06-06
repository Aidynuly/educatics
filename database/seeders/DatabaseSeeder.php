<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Answer;
use App\Models\Article;
use App\Models\City;
use App\Models\Course;
use App\Models\CourseIntro;
use App\Models\CourseVideo;
use App\Models\Employee;
use App\Models\Moderator;
use App\Models\Promocode;
use App\Models\Question;
use App\Models\School;
use App\Models\Tariff;
use App\Models\Test;
use App\Models\Translate;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Translate::factory()->times(200)->create();
        City::factory(1)->create();
        School::factory(15)->create();
        Tariff::factory(3)->create();
        Employee::factory(20)->create();
        Promocode::factory(100)->create();
        Article::factory(30)->create();
        Video::factory(100)->create();
        Course::factory(1)->create();
        User::factory(100)->create();
        CourseIntro::factory(5)->create();
        UserCourse::factory(20)->create();
        Test::factory(5)->create();
        Question::factory(25)->create();
        Answer::factory(100)->create();
        CourseVideo::factory(5)->create();
        Moderator::factory(1)->create();
    }
}
