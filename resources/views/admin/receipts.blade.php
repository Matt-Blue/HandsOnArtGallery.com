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
                        <h1>All Receipts</h1>
                        <p>Event Receipts Only</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 align-center">
                        <a href="{{ url('/dashboard') }}"><button class="btn btn-success">Back to Dashboard</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><!-- READ RECEIPTS -->
                        <?php 
                        if(!isset($future_receipts) || sizeof($future_receipts) === 0){ ?>
                            <div class="text-center">                            
                                There are no receipts as of 3 weeks ago<br><br>                                
                            </div>
                        <?php } else { 
                            foreach($future_receipts as $r){ 
                                $event =  DB::table('events')->where('id', '=', $r->event_id)->get();
                                $user =  DB::table('users')->where('id', '=', $r->user_id)->get();
                                ?>
                                <div class="col-md-4 text-left">
                                    <?php foreach($event as $e){ ?>
                                        Event Name: <?=$e->name?><br>
                                        Event Date: <?=formatDate($e->date)?><br>
                                        Event Price: $<?=$e->price?><br>
                                    <?php } ?>
                                    <?php foreach($user as $u){ ?>
                                        User: <?=$u->name?><br>
                                        Email: <?=$u->email?><br>
                                    <?php } ?>
                                    Time of purchase: <?=formatDate($r->created_at)?> at <?=formatTime($r->created_at)?><br><br><br>
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