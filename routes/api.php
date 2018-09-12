<?php


Route::post('/register', 'Api\SubscriberController@register');
Route::middleware(['auth:api', 'subscriber'])->group(function () {
    Route::get('/clients', 'Api\SubscriberController@clients');
    Route::get('/clients/my', 'Api\SubscriberController@myClients');
    Route::get('/countries', 'Api\SubscriberController@countries');
    Route::get('/events', 'Api\SubscriberController@events');
    Route::get('/groups/join-requests', 'Api\SubscriberController@joinRequests');
    Route::get('/groups', 'Api\SubscriberController@groups');
    Route::post('/groups/{id}/join', 'Api\SubscriberController@joinGroup');
    Route::post('/groups/{id}/exit', 'Api\SubscriberController@exitGroup');
    Route::get('/messages', 'Api\SubscriberController@messages');
    Route::get('/messages/unread', 'Api\SubscriberController@unreadMessages');
    Route::get('/messages/read', 'Api\SubscriberController@readMessages');
    Route::post('/messages/{id}/delete', 'Api\SubscriberController@deleteMessage');
    Route::post('/messages/{id}/read', 'Api\SubscriberController@readMessage');
    Route::post('/update-password', 'Api\SubscriberController@updatePassword');
    Route::post('/update', 'Api\SubscriberController@update');
    Route::get('/user', 'Api\SubscriberController@user');
    Route::get('/fcm-token', 'Api\SubscriberController@fcmToken');

});
