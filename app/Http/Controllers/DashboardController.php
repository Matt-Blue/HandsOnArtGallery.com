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
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function Dashboard(){
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            return view('dashboard');
        }else{
            if(DB::table('signups')->where('user_id', '=', Auth::user()->id)->exists()){
                $signups =  DB::table('signups')->where('user_id', '=', Auth::user()->id)->get();
            }
            if(isset($signups)){
                return view('dashboard')->with('signups', $signups);
            }else{
                return view('dashboard');
            }
        }
    }

    public function Signups(){
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            $signups = array();
            $events = DB::table('events')->orderBy('date','DESC')->get();
            foreach($events as $event){
                $signup = DB::table('signups')->where('event_id', '=', $event->id)->get();
                foreach($signup as $signup){
                    array_push($signups, $signup);
                }
            }
            return view('admin/signups')->with('signups', $signups);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function Receipts(){
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            $future_receipts =  DB::table('receipts')->where('created_at', '>=', time()-(21 * 24 * 60 * 60))->get();
            $past_receipts =  DB::table('receipts')->where('created_at', '<', time()-(21 * 24 * 60 * 60))->get();
            return view('admin/receipts')->with('future_receipts', $future_receipts)->with('past_receipts', $past_receipts);
        }else{
            return redirect()->route('welcome');
        }        
    }

    public function Users(){
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            $users =  DB::table('users')->get();
            return view('admin/users')->with('users', $users);
        }else{
            return redirect()->route('welcome');
        }    
    }
}
