@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<!-- ADMIN SECTION -->
@if(Auth::user()->email === \Config::get('constants.super_admin'))
<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Admin Panel</h1>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="row">
                    <div class="col-md-4 text-center">
                        <center><a href="{{ route('calendar') }}"><button class="btn btn-primary pull-center">Calendar</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/gallery/all') }}"><button class="btn btn-success pull-center">Gallery</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="#requests"><button class="btn btn-warning pull-center" disabled>Party Requests</button></a></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/event') }}"><button class="btn btn-primary pull-center">Add to Events</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/gallery/create') }}"><button class="btn btn-success pull-center" disabled>Add to Gallery</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/pricing') }}"><button class="btn btn-warning pull-center">Manage Price List</button></a></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/dashboard/signups') }}"><button class="btn btn-primary pull-center">Event Signups</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/dashboard/receipts') }}"><button class="btn btn-success pull-center">All Receipts</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/dashboard/users') }}"><button class="btn btn-warning pull-center">All Users</button></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<!-- USER SECTION -->
@else

<!-- SIGNUPS -->
<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>My Events</h1>
                        <a href="{{ route('calendar') }}"><button class="btn btn-primary pull-center">Find Events</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-left">
                        <br><!-- READ SIGNUPS -->
                        <?php 
                            if(!isset($signups)){ ?>
                            <div class="text-center">                            
                                You have not signed up for any events!<br><br>                                
                            </div>
                            <?php }
                            else{
                                foreach ($signups as $s){
                                    echo('<div class="col-md-4 text-left>"');
                                    $event =  DB::table('events')->where('id', '=', $s->event_id)->get();
                                    if(isset($event)){
                                        foreach($event as $e){
                                        ?>
                                            <br><!-- READ EVENT -->
                                            Name: <?=$e->name?>
                                            <br>
                                            Description: <?=$e->description?>
                                            <br>
                                            Event Type: 
                                                <?php 
                                                    switch($e->type){
                                                        case "open": echo "Walk-In Studio"; break;
                                                        case "workshop": echo "Workshop"; break;
                                                        case "party": echo "Party"; break;
                                                    }
                                                ?>
                                            <br>
                                            Start: 
                                                <?=formatDate($e->date)?>                 
                                                at <?=formatTime($e->start_time)?>
                                            <br>
                                            End:   
                                                <?=formatDate($e->date)?> 
                                                at <?=formatTime($e->end_time)?>
                                            <br>
                                            Attending: <?php echo DB::table('signups')->where('event_id', $e->id)->count('user_id'); ?>
                                            <br>
                                            <?php if($e->price != NULL){ echo("Price: $" . $e->price); }
                                            else{ echo("Price: cost of materials"); }?>   
                                            <br><br>                                            
                                            
                                            <?php 
                                                $user_id = Auth::user()->id;
                                                $receipt =  DB::table('receipts')->where([
                                                    ['event_id', '=', $e->id],
                                                    ['user_id', '=', $user_id]
                                                ])->get();
                                                if(sizeof($receipt) != 0){
                                            ?>
                                                <a href="{{ url('event/'.$e->id) }}"><button class="btn pull-center" style="width: 100%;">Receipt</button></a>
                                            <?php
                                                }else{
                                            ?>
                                                <a href="{{ url('event/'.$e->id) }}"><button class="btn btn-primary pull-center">View</button></a>
                                                <a href="{{ url('pay/'.$e->id) }}"><button class="btn btn-success pull-center">Pay</button></a>
                                                <a href="{{ url('signup/cancel/'.$e->id) }}"><button class="btn btn-danger pull-center">Cancel</button></a>
                                            <?php } ?>                                            
                                            <br>
                                        <?php echo('<br><br></div>'); ?>
                        <?php }}}} ?>
                        <br><br>                        
                    </div>
                </div>
            </section>
        </div>
    </div>  
</div>
@endif

@endsection