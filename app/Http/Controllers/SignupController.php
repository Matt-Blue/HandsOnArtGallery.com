<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//to get information on current user
use Illuminate\Support\Facades\DB;//to perform database queries
use Illuminate\Support\Facades\Redirect;//easy redirects
use Illuminate\Support\Facades\URL;//easy url manipulation
use App\Http\Requests\ContactFormRequest;//used for creating tasks
use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    
//************SIGNUP CRUD SECTION************//
    
    ///////////////////////////////////
    ///////////CREATE SIGNUP///////////
    ///////////////////////////////////

    public function Create($event_id){

        $user_id = Auth::user()->id;
        $paid = false;

        // Set attributes to return
        $attributes = array(
            'event_id' => $event_id, 
            'user_id' => $user_id,
            'paid' => $paid
        );

        if($this->CheckUnpaid($event_id) === "valid"){
            // Create signup, save attributes, and send to view
            $signup = new \App\Signup;
            $this->Save($signup, $attributes);
            // return view('signup.pay', compact('signup'));
            return redirect('/dashboard');
        }else{
            // Send error to error page
            return view('signup.error',  ['event_id' => $attributes['event_id'], 'error' => $this->CheckUnpaid($event_id)]);
        }

        

    }

    ///////////////////////////////////
    ///////////DELETE SIGNUP///////////
    ///////////////////////////////////

    public function Delete($id){

        // \App\Signup::destroy($id);
        DB::table('signups')->where([['user_id', '=', Auth::user()->id],['event_id', '=', $id]])->delete();

        return redirect()->route('dashboard');

    }

//***********SAVE AND VALIDATE SECTION***********//

    ///////////////////////////////////
    /////////////SAVE SIGNUP///////////
    ///////////////////////////////////

    public function Save($signup, $attributes){

        // Set all attributes in signup object and save to database
        $signup->event_id = $attributes['event_id'];
        $signup->user_id = $attributes['user_id'];
        $signup->paid = $attributes['paid'];
        $signup->save();

    }

    ///////////////////////////////////
    ////////////CHECK SIGNUP///////////
    ///////////////////////////////////

    public function CheckUnpaid($event_id){

        // EVENT ID VALIDATION
        if(!$event_id){ return "Event does not exist."; }
        elseif(\App\Event::find($event_id) === null){ return "Event does not exist."; }
        elseif(DB::table('signups')
        ->where('user_id', '=', Auth::user()->id)
        ->where('event_id', '=', $event_id)
        ->exists()){ return "You have already signed up for this event."; }
        elseif(DB::table('signups')->where('event_id', $event_id)->count('user_id') >= get_attributes(DB::table('events')->where('id', $event_id)->get())['max']){
            return "Max attendees already hit.";
        }
        else return "valid";
        
        return $valid;

    }
}
