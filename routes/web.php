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
})->name('welcome');

// Dashboard
Route::get('/dashboard', 'DashboardController@Dashboard')->name('dashboard');
Route::get('/dashboard/signups', 'DashboardController@Signups')->name('admin_signups');
Route::get('/dashboard/receipts', 'DashboardController@Receipts')->name('admin_receipts');

// Calendar
Route::get('/calendar', function() {
    $events = DB::table('events')->get();
    return view('calendar', compact('events'));
})->name('calendar');

/////////////
// Events  //
/////////////

// VIEWS
Route::get('/event', 'EventsController@CreateView')->name('create_event_view'); //create event view
Route::get('/event/{id}', 'EventsController@Read')->name('read_event');         //read event view
// ACTIONS
Route::post('/event/create', 'EventsController@Create')->name('create');        //create event
Route::post('/event/update/{id}', 'EventsController@Update')->name('update');   //update event
Route::get('/event/delete/{id}', 'EventsController@Delete')->name('delete');    //delete event

//////////////
// Signups  //
//////////////

Route::get('/signup/{event_id}', 'SignupController@Create');                    //create signup
Route::get('/signups', 'SignupController@Read')->name('signups');               //read signup
Route::get('/signup/cancel/{id}', 'SignupController@Delete');                   //delete signup

////////////////
// Price List //
////////////////

Route::get('/pricing', 'PricingController@Index')->name('prices');              //price list view
Route::post('/pricing/create', 'PricingController@Create');                     //create price
Route::get('/pricing/delete/{name}', 'PricingController@Delete');               //delete price

///////////////////////
// Gallery & Artwork //
///////////////////////

// Gallery View
Route::get('/gallery/{category}', 'GalleryController@Gallery')->name('gallery');    //gallery view with category
Route::get('/gallery/create', 'GalleryController@CreateView');                      //create artwork view

/////////////
// Payment //
/////////////

// PAY
Route::get('/pay/{id}', 'PaymentsController@Checkout')->name('checkout');               //pay for event (view form)
Route::post('/charge/{event_id}', 'PaymentsController@ChargeEvent')->name('charge');    //pay for event (action)
