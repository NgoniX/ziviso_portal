<?php

Route::get('/', function () {
    //App::make('files')->link(storage_path('app/public'), public_path('storage'));
    //return view('welcome');
    if(auth()->check()){
       return redirect()->route('home');
    }
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
    ->resource('profile', 'ProfileController', ['only'=>['index', 'store']]);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/', 'Admin\AdminController');
    Route::get('clients/messages/{id}', 'Admin\ClientsController@showMessage');
    Route::resource('subscribers', 'Admin\SubscribersController', ['only'=>['index', 'update', 'show']]);
    Route::resource('subscriptions', 'Admin\SubscriptionsController');
    Route::resource('clients', 'Admin\ClientsController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('settings', 'Admin\SettingsController');
});

Route::prefix('client')->middleware(['auth', 'client-assistant'])->group(function () {
    Route::get('/', 'Client\ClientController@index');
    Route::post('subscribers/import/save', 'Client\ImportController@save');
    Route::get('subscribers/import/outcome/{payload}', 'Client\ImportController@outcome');
    Route::get('subscribers/import/sample', 'Client\ImportController@downloadSample');
    Route::get('subscribers/import', 'Client\ImportController@import');
    Route::resource('subscribers/requests', 'Client\RequestsController', ['only'=>['index', 'update']]);
    Route::resource('subscribers', 'Client\SubscribersController');
    Route::resource('messages', 'Client\MessagesController');
    Route::resource('groups', 'Client\GroupsController');
    Route::get('events/api', 'Client\EventsController@api');
    Route::resource('events', 'Client\EventsController');
    Route::middleware('client')->group(function (){
        Route::resource('settings', 'Client\SettingsController', ['only'=>['index', 'update']]);
        Route::resource('subscription', 'Client\SubscriptionsController');
        Route::resource('users', 'Client\UsersController');
    });

});

Route::prefix('subscriber')->middleware(['auth', 'subscriber'])->group(function () {
    Route::get('/', 'Subscriber\SubscriberController@index');
    Route::resource('messages', 'Subscriber\MessagesController');
    Route::resource('channels', 'Subscriber\ChannelsController');
    Route::resource('profile', 'Client\ProfileController');
});
