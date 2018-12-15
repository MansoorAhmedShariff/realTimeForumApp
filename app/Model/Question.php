<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //In order to get a single question to 'SHOW' or 'DELETE' in QuestionController,
    //We can pass the key name that we will provide (Below Example We should pass slug to search)
    /* public function getRouteKeyName(){
        return 'slug';
    } */

    //Specify Request Names To Accept
    //protected $fillable = ['title','slug','body','category_id','user_id'];

    //Accept All Request Values
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);   
    }
}
