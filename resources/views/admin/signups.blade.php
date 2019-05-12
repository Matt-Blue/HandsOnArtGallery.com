@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

@if(Auth::user()->email === Config::get('constants.super_admin'))

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
            <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Event Signups</h1>
                        <p>Only includes future signups</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 align-center">
                        <a href="{{ url('/dashboard') }}"><button class="btn btn-success">Back to Dashboard</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><!-- READ REQUESTS -->
                        <?php 
                        if(!isset($future_signups) || sizeof($future_signups) === 0){ ?>
                            <div class="text-center">                            
                                There are no future signups!<br><br>                                
                            </div>
                        <?php } else { 
                            foreach($future_signups as $s){ 
                                $event =  DB::table('events')->where('id', '=', $s->event_id)->first();
                                $user =  DB::table('users')->where('id', '=', $s->user_id)->first();
                                ?>
                                <div class="col-md-4 text-left">
                                    Event: <?=$event->name?><br>
                                    Date: <?=$event->date?><br>
                                    User: <?=$user->name?><br>
                                    Email: <?=$user->email?><br><br><br>
                                </div>
                            <?php }
                        } ?>                        
                    </div>
                </div> 
            </section>
        </div>
    </div>
</div>

@else
    <?php redirect()->route('welcome'); ?>
@endif

@endsection