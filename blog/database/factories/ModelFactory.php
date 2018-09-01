<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});
*/
$factory->define(App\Teacher::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->name,
        'profession' => $faker->randomElement($array = array('engineering','mathematics','physics'))
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->name,
        'career' => $faker->randomElement($array = array('engineering','mathematics','physics'))
    ];
});

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph(4),
        'value' => $faker->numberBetween(1,4),
        'teacher_id' => 1
    ];
});
//REPLACE: $faker->mt_rand(1,50) 
//WITH: $faker->optional()->passthrough(mt_rand(1,50));
