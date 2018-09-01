<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        DB::statement('SET_FOREIGN_KEYS_CHECKS = 0');
        Teacher::truncate();
        Student::truncate();
        Course::truncate();
        // LEFT OFF HERE....DB::Course_Table
        
        factory(Teacher::class, 50)->create();
        factory(Student::class, 500)->create();
        factory(Course::class, 40 )->create()->each(function($course){
            $course->students()->attach(array_rand(range(1,500),40));
        });
        //Model::unguard();

    }
}
