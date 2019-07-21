<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(\App\Test::class, function (Faker $faker) {
    return [
        'test_name' => $faker->unique()->company,
        'fee' => rand(500,600),
        'test_type_id' => rand(1,10),

    ];
});

$factory->define(\App\TestType::class, function (Faker $faker) {
    return [
        'type_name' => $faker->unique()->city

    ];
});

$factory->define(\App\TestRequest::class, function (Faker $faker) {
    return [
        'patient_name' => $faker->name,
        'birth_date' => $faker->date('Y-m-d','now'),
        'mobile_no' => $faker->phoneNumber,
        'totalPayment' => rand(2000,4000),
        'billNo' => $faker->unique()->phoneNumber

    ];
});
//
//$factory->define(\App\Pranker::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//
//    ];
//});
//$factory->define(\App\Category::class, function (Faker $faker) {
//    return [
//        'category_name' => $faker->creditCardType,
//
//    ];
//});
//$factory->define(\App\Phone::class, function (Faker $faker) {
//    return [
//        'number' => $faker->phoneNumber,
//        'pranker_id' => rand(1,10),
//
//    ];
//});
//$factory->define(\App\Post::class, function (Faker $faker) {
//    return [
//        'pranker_id' => rand(1, 10),
//        'category_id' => rand(1, 10),
//        'title' => $faker->title,
//        'description' => $faker->paragraph,
//
//    ];
//});
