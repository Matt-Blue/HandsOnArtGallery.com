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

class RequestController extends Controller
{
    //************REQUEST CRUD SECTION************//

    public function View($event_id){
        return view('events/party/request')->with('event_id', $event_id);
    }
    
    ///////////////////////////////////
    //////////CREATE REQUEST///////////
    ///////////////////////////////////

    public function Create(Request $request){

        // Send for validation
        $attributes = $this->check($request);

        // Create request with attributes and save in database
        $request = new \App\Request;
        $this->Save($request, $attributes);
        
        return redirect()->route('dashboard');

    }

    ///////////////////////////////////
    ///////////UPDATE REQUEST//////////
    ///////////////////////////////////

    public function Update($id, Request $request){

        // Send for validation
        $attributes = $this->check($request);

        // Create request with attributes and save in database
        $request = \App\Request::find($id);
        $this->Save($request, $attributes);

        return redirect()->route('calendar');

    }

    ///////////////////////////////////
    ///////////DELETE REQUEST//////////
    ///////////////////////////////////

    public function Delete($id){

        \App\Event::destroy($id);
        $requests =  DB::table('requests')->where('event_id', '=', $id)->delete();

        return redirect()->route('dashboard');

    }

    ///////////////////////////////////
    //////////AUTHORIZE REQUEST////////
    ///////////////////////////////////

    public function Auth($id){

        // Create request with attributes and save in database
        $request = \App\Request::where('event_id',$id)->first();
        $request->status = 1;
        $request->save();

        return redirect()->route('dashboard');

    }

    ///////////////////////////////////
    ////////////DENY REQUEST///////////
    ///////////////////////////////////

    public function Deny($id){

        // Create request with attributes and save in database
        $request = \App\Request::where('event_id',$id)->first();
        $request->status = -1;
        $request->save();

        return redirect()->route('dashboard');

    }

//***********SAVE AND VALIDATE SECTION***********//

    ///////////////////////////////////
    /////////////SAVE REQUEST///////////
    ///////////////////////////////////

    public function Save($request, $attributes){

        // Set all attributes in request object and save to database
        $request->event_id = $attributes['event_id'];
        $request->user_id = $attributes['user_id'];
        $request->details = $attributes['details'];
        $request->accomodations = $attributes['accomodations'];
        $request->location = $attributes['location'];
        $request->status = $attributes['status'];
        $request->save();

    }

    ///////////////////////////////////
    ////////////CHECK REQUEST//////////
    ///////////////////////////////////

    public function Check(Request $request){

        // EVENT ID VALIDATION
        if(!$request->get('event_id')){ redirect()->back(); }
        else{ $event_id = $request->get('event_id'); }

        // DETAILS VALIDATION
        if(!$request->get('details')){ $details = "none"; }
        else{ $details = $request->get('details'); }

        // ACCOMODATIONS VALIDATION
        if(!$request->get('accomodations')){ $accomodations = "none"; }
        else{ $accomodations = $request->get('accomodations'); }

        // LOCATION VALIDATION
        if(!$request->get('location')){ $location = "Hands On"; }
        else{ $location = $request->get('location'); }

        $user_id = Auth::user()->id;

        $status = 0;

        // Set attributes to return
        $attributes = array(
            'event_id' => $event_id, 
            'user_id' => $user_id, 
            'details' => $details, 
            'accomodations' => $accomodations,
            'location' => $location,
            'status' => $status
        );
        return $attributes;

    }

}
