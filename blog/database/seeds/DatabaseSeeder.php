<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Teacher;
use App\Student;
use App\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Teacher::truncate();
        Student::truncate();
        Course::truncate();
        // LEFT OFF HERE....DB::Course_Table
        DB::table('course_student')->truncate();


        factory(Teacher::class, 50)->create();
        factory(Student::class, 500)->create();
        //need to add students randomly..
        //attach() method receives an array...we chose 40 random from 1 to 500s
        factory(Course::class, 40 )->create()->each(function($course){
            $course->students()->attach(array_rand(range(1,500),40));
        });
        //Model::unguard();

    }
}
