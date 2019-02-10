<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//to get information on current user
use Illuminate\Support\Facades\DB;//to perform database queries
use Illuminate\Support\Facades\Redirect;//easy redirects
use Illuminate\Support\Facades\URL;//easy url manipulation
use App\Http\Requests\ContactFormRequest;//used for creating tasks
use App\Http\Controllers\Controller;
use App\Mail\MailRequest;

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
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            // all signups after current date for admin use
            $signups = array();
            $events = DB::table('events')->where('date', '>=', date("Y-m-d"))->get();
            foreach($events as $e){
                $signup = DB::table('signups')->where('event_id', '=', $e->id)->get();
                foreach($signup as $s){
                    array_push($signups, $s);
                }
            }
        }else{
            // all signups associated with user
            if(DB::table('signups')->where('user_id', '=', Auth::user()->id)->exists()){
                $signups =  DB::table('signups')->where('user_id', '=', Auth::user()->id)->get();
            }
        }

        // get receipts
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            $receipts =  DB::table('receipts')->where('created_at', '>=', time()-(21 * 24 * 60 * 60))->get();
        }else{
            $receipts =  DB::table('receipts')->where('user_id', '=', Auth::user()->id)->get();
        }

        if(isset($signups)){
            return view('dashboard')->with('requests', $requests)->with('signups', $signups)->with('receipts', $receipts);
        }else{
            // return view without signups
            return view('dashboard')->with('requests', $requests)->with('receipts', $receipts);
        }
    }
}
