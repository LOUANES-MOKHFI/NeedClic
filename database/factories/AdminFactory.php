<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'uuid' => Uuid::generate()->string,
        'name' => 'Louanes Mokhfi',
        'email' => 'louanes.mokhfi@gmail.com',
        //'email_verified_at' => now(),
        'role_id' => 1,
        'password' => bcrypt('123456789'), // password
       // 'remember_token' => Str::random(10),
    ];
});
