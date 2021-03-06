<?php

use App\User;
use App\Model\Question;
use App\Model\Category;
use App\Model\Reply;
use App\Model\Like;
use Illuminate\Database\Seeder;
use App\Model\Notif;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Category::class, 10)->create();
        factory(Question::class, 25)->create();
        factory(Notif::class, 50)->create();
        factory(Reply::class, 100)->create()->each(function ($reply){
            return $reply->like()->save(factory(Like::class)->make());
        });
    }

}
