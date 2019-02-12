<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;//to get information on current user
use Illuminate\Support\Facades\DB;//to perform database queries
use Illuminate\Support\Facades\Redirect;//easy redirects
use Illuminate\Support\Facades\URL;//easy url manipulation
use App\Http\Requests\ContactFormRequest;//used for creating tasks
use App\Http\Controllers\Controller;

class EventsController extends Controller
{    
    
    /////////////////////////////////
    ///////////EVENT CRUD////////////
    /////////////////////////////////

    // READ
    public function Read($id){
        $events =  DB::table('events')->where('id', '=', $id)->get();
        if(Auth::user() && Auth::user()->email === \Config::get('constants.super_admin')){
            return view('events/event')->with('event', $events[0])->with('update', true);
        }else{
            return view('events/read')->with('event', $events[0]);
        }
    }
    public function CreateView(){
        return view('events/event')->with('update', false);
    }

    // CREATE
    public function Create(Request $request){
        $event = new \App\Event;
        $this->ValidSave($request, $event);
        return redirect()->route('calendar');
    }

    // UPDATE
    public function Update($id, Request $request){
        $event = \App\Event::find($id);
        $this->ValidSave($request, $event);
        return redirect()->route('calendar');
    }

    // DELETE
    public function Delete($id){
        \App\Event::destroy($id);
        return redirect()->route('calendar');
    }

    ///////////////////////////////////
    /////////////SAVE EVENT////////////
    ///////////////////////////////////

    // VALIDATE AND SAVE
    public function ValidSave(Request $request, $event){

        // GENERAL VALIDATION
        $this->validate($request, [
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        // EVENT NAME VALIDATION
        if(!$request->get('name')){ redirect()->back(); }
        else{ $name = $request->get('name'); }

        // DESCRIPTION VALIDATION
        if(!$request->get('description')){ redirect()->back(); }
        else{ $description = $request->get('description'); }

        // DATE VALIDATION
        if(!$request->get('date')){ $date = date("Y-m-d"); }
        else{ $date = $request->get('date'); }

        // START AND END TIME VALIDATION
        if(!$request->get('start_time')){ $start_time = "00:00:00"; }
        else{ 
            if(stripos($request->get('start_time'), 'M') !== false){
                $start_time = $this->TimeConvert($request->get('start_time')); 
            }else{
                $start_time = $request->get('start_time');
            }
        }
        if(!$request->get('end_time')){ $end_time = $start_time; }
        else{
            if(stripos($request->get('end_time'), 'M') !== false){
                $end_time = $this->TimeConvert($request->get('end_time')); 
            }else{
                $end_time = $request->get('end_time');
            }
        }

        // TYPE VALIDATION
        if(!$request->get('type')){ $type = "workshop"; }
        else{ $type = $request->get('type'); }

        // PRICE VALIDATION
        if(!$request->get('price')){ $price = NULL; }
        else{ $price = $request->get('price'); }

        // UPLOAD PHOTO AND SET SLUG TO FILE DESTINATION
        if($request->file('image')){
            $file = $request->file('image');
            $file_destination = 'public/img';
            $file_name = time().'.jpg';
            $file->move($file_destination, $file_name);
        }elseif($request->get('image')){
            $file_name = $request->get('image');
        }else{
            $file_name = null;
        }

        $event->name = $name;
        $event->description = $description;
        $event->type = $type;
        $event->date = $date;
        $event->start_time = $start_time;
        $event->end_time = $end_time;
        $event->price = $price;
        $event->image = $file_name;
        $event->save();
    }

    //////////////////
    /////HELPERS//////
    //////////////////

    // CONVERT TIME TO 24 HOUR
    public function TimeConvert($time){
        $t1 = explode(" ", $time);
        $t2 = explode(":", $t1[0]);
        if($t1[1] == "PM" && $t2[0] == "12"){
            return $t2[0] . ":" . $t2[1];
        }
        elseif($t1[1] == "AM" && $t2[0] == "12"){
            return "00:" . $t2[1];
        }
        elseif($t1[1] == "AM"){
            return str_pad($t2[0], 2, '0', STR_PAD_LEFT) . ":" . $t2[1];
        }elseif($t1[1] == "PM"){
            return ($t2[0] + 12) . ":" . $t2[1];
        }
        else{
            echo "Error in time conversion";
            die();
        }
    }
}
