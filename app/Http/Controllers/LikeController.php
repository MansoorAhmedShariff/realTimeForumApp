<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use App\Events\LikeEvent;

class LikeController extends Controller
{
   public function Like(Reply $reply, Request $request){
        $reply->like()->create([
            'user_id' => $request->user_id
           ]);
           
           //return response()->json("Added Successfully", 200);
           broadcast(new LikeEvent($reply->id, 1))->toOthers();
   }

   public function Unlike(Reply $reply, Request $request){
        $reply->like()->where('user_id', $request->user_id)->first()->delete();
        
        //return response()->json("Deleted Successfully", 200);
        broadcast(new LikeEvent($reply->id, 0))->toOthers();
        

   }
}
