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
$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'country' => $faker->country,
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'country_id' => App\Country::select('id')->orderByRaw("RAND()")->first()->id,
        'password' => bcrypt('12345'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'user_id' => $faker->numberBetween(1, App\User::count()),
        'content' => $faker->text($maxNbChars = 200),
    ];
});
$factory->define(App\Phone::class, function (Faker\Generator $faker) {
    return [
        'ph_number' => $faker->tollFreePhoneNumber ,
        'user_id' => $faker->unique()->numberBetween(1, App\User::count())
    ];
});
$factory->define(App\UserRole::class, function (Faker\Generator $faker) {
    return [
      'user_id' => App\User::select('id')->orderByRaw("RAND()")->first()->id,
      'role_id' => App\Role::select('id')->orderByRaw("RAND()")->first()->id,
    ];
});
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement($array = array ("admin","client","agent","agency"))
    ];
});
