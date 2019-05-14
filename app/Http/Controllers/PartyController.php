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

class PartyController extends Controller
{
    public function Parties(){
        $items = DB::table('items')->get();
        return view('parties')->with('items', $items);
    }
}