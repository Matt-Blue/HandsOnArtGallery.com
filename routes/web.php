<?php


// All routes lie below for the web application
// API routes lie in the api.php file

//authorization routes 
Auth::routes();    
Route::get('/logout_user', function(){
    Auth::logout();
    return view('welcome');
})->name('logout_user');                                                           

// Default View
// Route::get('/', function () { return view('index'); })->name('index');
// Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
Route::get('/', function () {
    return view('welcome');
}); 
Route::get('/services', function () {
    return view('services');
})->name('services'); 
Route::get('/gallery', function () {
    return view('gallery.gallery');
})->name('gallery'); 

// Views

Route::get('/dashboard', 'DashboardController@Dashboard')->name('dashboard');   //dashboard view
Route::get('/calendar', function() {
    $events = DB::table('events')->get();
    return view('events/calendar', compact('events'));
})->name('calendar');      //calendar view

////////////////////////////
// Events CRUD Operations //
////////////////////////////

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
// Party Routes //
//////////////////

Route::get('/party/new', function () { return view('events.party.create'); });  //create new party view
Route::get('/party/request/{event_id}', 'RequestController@View')->name('request');  //create new party view

Route::get('/party/request/delete/{event_id}', 'RequestController@Delete')->name('delete_request');  //delete request

Route::post('/party/create/request', 'RequestController@Create')->name('create_request'); //create party request

Route::get('/party/edit/{id}', 'RequestController@Edit')->name('edit_request'); //create new party view
Route::post('/party/update/request', 'RequestController@Update')->name('update_request'); //update party request

Route::get('/party/requests', 'RequestController@Read')->name('requests');      //show party requests as user

Route::get('party/admin/requests', 'RequestController@Read');                   //view party requests as admin

Route::get('party/admin/authorize/{id}', 'RequestController@Auth')->name('authorize'); //authorize party requests as admin
Route::get('party/admin/deny/{id}', 'RequestController@Deny')->name('deny'); //deny party requests as admin

////////////////////////////
// Signup CRUD Operations //
////////////////////////////

// CREATE
Route::get('/signup/{event_id}', 'SignupController@Create');                    //create new signup

// READ
Route::get('/signups', 'SignupController@Read')->name('signups');               //signups read

// DELETE
Route::get('/signup/cancel/{id}', 'SignupController@Delete');                   //delete signup

/////////
// Pay //
/////////

// PAY