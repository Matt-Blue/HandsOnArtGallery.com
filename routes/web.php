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

// Dashboard
Route::get('/dashboard', 'DashboardController@Dashboard')->name('dashboard');

// Calendar
Route::get('/calendar', function() {
    $events = DB::table('events')->get();
    return view('calendar', compact('events'));
})->name('calendar');

// Gallery View
Route::get('/gallery', function () { return view('gallery.gallery'); })->name('gallery');

/////////////
// Events  //
/////////////

// READ
Route::get('/event', 'EventsController@CreateView')->name('create_event_view');              //create & update view
Route::get('/event/{id}', 'EventsController@Read')->name('read_event');         //create & update view

// CREATE
Route::post('/event/create', 'EventsController@Create')->name('create');        //create new event

// UPDATE
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