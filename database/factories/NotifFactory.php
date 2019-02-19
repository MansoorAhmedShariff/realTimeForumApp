<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Model\Notif::class, function (Faker $faker) {
    $type = 'App\Notifications\NewReply';
    $notifiable_type = 'App\User';
    return [
        'type' => $type,
        'notifiable_type' => $notifiable_type,
        'user_id' => function(){
            return User::all()->random();
        },
        'data' => $faker->sentence,
        'name' => $faker->name,
        'path' => rand(1,50),
        'read_at' => null
    ];
});
