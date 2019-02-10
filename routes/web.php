<?php

///////////////////
// Authorization //
///////////////////

Auth::routes();    
Route::get('/logout_user', function(){
    Auth::logout();
    $items =  DB::table('items')->get();
    return view('welcome')->with('items', $items);
})->name('logout_user');                                                           

/////////////
// General //
/////////////

// Default View
Route::get('/', function () {
    $items =  DB::table('items')->get();
    return view('welcome')->with('items', $items);
});

// Gallery View
Route::get('/gallery', function () {
    return view('gallery.gallery');
})->name('gallery');

// Dashboard
Route::get('/dashboard', 'DashboardController@Dashboard')->name('dashboard');

// Calendar
Route::get('/calendar', function() {
    $events = DB::table('events')->get();
    return view('calendar', compact('events'));
})->name('calendar');

//////////////////
// Events CRUD  //
//////////////////

// CREATE
Route::get('/event/new', function () { return view('events.create'); });        //create new event view
Route::post('/event/create', 'EventsController@Create')->name('create');        //create new event

// READ
Route::get('/event/view/{id}', 'EventsController@Read')->name('read');          //single event view

// UPDATE
Route::get('/event/update', function () { return view('events.update'); });     //update event view
Route::post('/event/update/{id}', 'EventsController@Update')->name('update');   //update event

// DELETE
Route::get('/event/delete/{id}', 'EventsController@Delete')->name('delete');    //delete event

//////////////////
// Signup CRUD  //
//////////////////

// CREATE
Route::get('/signup/{event_id}', 'SignupController@Create');                    //create new signup

// READ
Route::get('/signups', 'SignupController@Read')->name('signups');               //signups read

// DELETE
Route::get('/signup/cancel/{id}', 'SignupController@Delete');                   //delete signup

/////////////
// Payment //
/////////////

// PAY
Route::get('/pay/{id}', 'PaymentsController@Checkout')->name('checkout');         //pay for event (view form)
Route::post('/charge/{event_id}', 'PaymentsController@Charge')->name('charge');   //pay for event (action)

// RECEIPT
Route::get('/receipt/{event_id}', 'PaymentsController@Receipt')->name('receipt');//pay for event (view receipt)