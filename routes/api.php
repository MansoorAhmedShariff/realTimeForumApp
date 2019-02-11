<?php


Route::apiResource('/question', 'QuestionController');
Route::apiResource('/category', 'CategoryController');
Route::apiResource('/question/{question}/reply', 'ReplyController');
Route::post('like/{reply}', 'LikeController@Like');
Route::delete('like/{reply}', 'LikeController@Unlike');

Route::get('/notif/{user}', 'NotifController@index');
Route::post('/notify', 'NotifController@store');
Route::post('/notifyupdate/{user}', 'NotifController@update');
Route::delete('/notifdelete/{user}', 'NotifController@destroy');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
