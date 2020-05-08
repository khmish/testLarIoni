<?php

use Illuminate\Http\Request;

use LaravelFCM\Message\Topics;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('test', function(){
    echo "";
    return "login";
})->middleware(['name1:hassan']);
Route::group(['middleware' => ['api'],'prefix' => 'auth'], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
    
Route::get('pushNotification/{title}/{msg}', function($title,$msg){
    $notificationBuilder = new PayloadNotificationBuilder($title);
    $notificationBuilder->setBody($msg)
                        ->setSound('default');

    $notification = $notificationBuilder->build();

    $topic = new Topics();
    $topic->topic('marketing');

    $topicResponse = FCM::sendToTopic($topic, null, $notification, null);

    if($topicResponse->isSuccess())
    {
        return response()->json('notification has been sent',200);
    }
    else {

         $topicResponse->shouldRetry();
        if($topicResponse->error()){
        return response()->json('notification has not been sent',400);

        } 
    }
});
