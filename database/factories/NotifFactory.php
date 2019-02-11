<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Model\Notif::class, function (Faker $faker) {
    $type = 'App\Notifications\NewReply';
    $notifiable_type = 'App\User';
    $data = '{"replyBy":"MansoorAhmed","question":"This is a question","path":"1"}';
    return [
        'type' => $type,
        'notifiable_type' => $notifiable_type,
        'user_id' => function(){
            return User::all()->random();
        },
        'data' => $data,
        'read_at' => null
    ];
});
