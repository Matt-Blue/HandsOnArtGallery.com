<?php

namespace HandsOnArtGallery.com\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//to get information on current user
use Illuminate\Support\Facades\DB;//to perform database queries
use Illuminate\Support\Facades\Redirect;//easy redirects
use Illuminate\Support\Facades\URL;//easy url manipulation
use HandsOnArtGallery.com\Http\Requests\ContactFormRequest;//used for creating tasks
use HandsOnArtGallery.com\Http\Controllers\Controller;
use HandsOnArtGallery.com\Mail\MailRequest;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    ///////////////////////////////////
    ////////////DASHBOARD//////////////
    ///////////////////////////////////
    
    public function Dashboard()
    {
        // get party requests
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            $requests =  DB::table('requests')->where('status', '=', 0)->get();
        }else{
            $requests =  DB::table('requests')->where('user_id', '=', Auth::user()->id)->get();
        }

        // get signups
        $s_check = DB::table('signups')->where('user_id', '=', Auth::user()->id)->exists();
        if($s_check){
            $signups =  DB::table('signups')->where('user_id', '=', Auth::user()->id)->get();
            // return view with signups        
            return view('dashboard')->with('requests', $requests)->with('signups', $signups);
        }else{
            // return view without signups
            if(Auth::user()->email === \Config::get('constants.super_admin')){
                // if super admin return all events for editing
                $events = DB::table('events')->get();
                return view('dashboard')->with('requests', $requests)->with('events', $events);
            }else{
                return view('dashboard')->with('requests', $requests);
            }            
        }
        
        
    }
        
    ///////////////////////////////////
    /////////////CALENDAR//////////////
    ///////////////////////////////////

    public function Calendar(){
        $events = DB::table('events')->get();
        return view('events.calendar', compact('events'));
    }
}
