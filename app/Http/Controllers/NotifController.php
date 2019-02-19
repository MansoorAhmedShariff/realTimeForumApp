<?php

namespace App\Http\Controllers;

use App\Model\Notif;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\NotifResource;

class NotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //$user_id = $request->user_id;
        $Notifications = $user->notif;
        $Unread = NotifResource::collection($user->notif->where('read_at', "=", null));
        $Read = NotifResource::collection($user->notif->where('read_at', "!=", null));

        if($Notifications != null){
            return response()->json(['message'=>'Notifications Found', 'Unread'=>$Unread, 'Read'=>$Read]);
         }else{
            return response()->json(['message'=>'No Notifications Found']);
         }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notifications = Notif::create($request->all());

        return response("Created Successfully", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function show(Notif $notif)
    {
        return $notif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notif $notif)
    {
        $notif->update($request->all());
        return response()->json("Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notif $notif)
    {
        $notif->delete();
        return response()->json('Deleted Successfully', 200);
    }
}
