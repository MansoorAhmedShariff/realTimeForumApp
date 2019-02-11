<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notif extends Model
{
    /* public function getRouteKeyName()
    {
        return 'id';
    } */
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $guarded = [];
}
