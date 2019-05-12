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

class PricingController extends Controller
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

    ////////////////////////////////
    ////////////MANAGE//////////////
    ////////////////////////////////
    
    public function Index()
    {
        $items =  DB::table('items')->get();
        if(Auth::user()->email === \Config::get('constants.super_admin')){
            return view('pricing/manage')->with('items', $items);
        }else{
            return view('welcome')->with('items', $items);
        }
    }

    // CREATE
    public function Create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        // NAME VALIDATION
        if(!$request->get('name')){ redirect()->back(); }
        else{ $name = $request->get('name'); }
        
        // PRICE VALIDATION
        if(!$request->get('price')){ redirect()->back(); }
        else{ $price = $request->get('price'); }

        DB::insert('insert into items (name, price) values (?,?)', [$name, $price]);
        return redirect()->back();
    }

    // DELETE
    public function Delete($name){
        DB::delete('delete from items where name = ?', [$name]);
        return redirect()->back();
    }
}
