<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
   public function Like(Reply $reply, Request $request){
        $reply->like()->create([
            //'user_id' => auth()->id()
            'user_id' => $request->user_id
           ]);
        return response()->json("Added Successfully", 200);
   }

   public function Unlike(Reply $reply, Request $request){
        $reply->like()->where('user_id', $request->user_id)->first()->delete();
        return response()->json("Deleted Successfully", 200);
   }
}
