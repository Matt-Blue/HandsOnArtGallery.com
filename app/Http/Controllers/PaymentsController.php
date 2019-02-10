<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;//to get information on current user
use Illuminate\Support\Facades\DB;//to perform database queries
use Illuminate\Support\Facades\Redirect;//easy redirects
use Illuminate\Support\Facades\URL;//easy url manipulation
use App\Http\Controllers\Controller;

require_once(public_path('stripe-php/init.php'));


class PaymentsController extends Controller
{
    
//************PAYMENT SECTION************//

    public function Checkout($id){

        $event =  DB::table('events')->where('id', '=', $id)->get();
        return view('payments.pay')->with('event', $event);

    }

    public function Charge($event_id){

        $user_id = Auth::user()->id;
        $event = \App\Event::find($event_id);

        \Stripe\Stripe::setApiKey(file_get_contents(base_path().'/storage/payment.key'));
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $event->price*100,
            'currency' => 'usd',
            'description' => $event->description,
            'source' => $token,
        ]);

        // create receipt in DB
        $receipt = new \App\Receipt;
        $receipt->event_id = $event_id;
        $receipt->user_id = $user_id;
        $receipt->save();

        return redirect()->route('dashboard');

    }

    public function Receipt($id){

        $event =  DB::table('events')->where('id', '=', $id)->get();
        return view('payments.receipt')->with('event', $event);

    }

}