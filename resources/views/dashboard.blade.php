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
                <div class="row">
                    <div class="col-md-4 text-center">
                        <center><a href="{{ route('calendar') }}"><button class="btn btn-primary pull-center">Manage Events</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="{{ url('/event/new') }}"><button class="btn btn-success pull-center">Create Event</button></a></center>
                    </div>
                    <div class="col-md-4 text-center">
                        <center><a href="#requests"><button class="btn btn-warning pull-center">Party Requests</button></a></center>
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
                                                <?=formatDate($e->start_date)?>                 
                                                at <?=formatTime($e->start_time)?>
                                            <br>
                                            End:   
                                                <?=formatDate($e->end_date)?> 
                                                at <?=formatTime($e->end_time)?>
                                            <br>
                                            Attending: <?php echo DB::table('signups')->where('event_id', $e->id)->count('user_id'); ?>
                                            <br>
                                            <!-- Price  -->
                                                <?php 
                                                    switch($e->type){
                                                        case "open": echo "Price: Cost of Materials<br>"; break;
                                                        case "workshop": echo "Price: $" . $e->price . " per person<br>"; break;
                                                        case "party": echo "Price: $" . $e->price . "<br>"; break;
                                                    }
                                                ?>
                                            <br>
                                            <a href="{{ url('signup/cancel/'.$e->id) }}"><button class="btn btn-danger pull-center">Cancel</button></a><br>
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

<hr>

<!-- ALL SECTION -->

<!-- PARTY REQUESTS -->
<div class="container-fluid" id="requests">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(Auth::user()->email === \Config::get('constants.super_admin'))
                            <h1>All Party Requests</h1>
                        @else
                            <h1>My Party Requests</h1>
                            <a href="{{ url('/party/new') }}"><button class="btn btn-warning pull-center">New Party Request</button></a><br>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><!-- READ REQUESTS -->
                        <?php 
                        if(!isset($requests)){ ?>
                            <div class="text-center">                            
                                You have no party requests!<br><br>                                
                            </div>
                        <?php }
                        else{
                            foreach($requests as $request){ 
                                $event =  DB::table('events')->where('id', '=', $request->event_id)->get();  
                                if(isset($event)){  
                                    echo('<div class="col-md-4 text-left>"');
                                ?>
                                    Name: <?= $event[0]->name; ?>
                                    <br>
                                    Description: <?= $event[0]->description; ?>
                                    <br>
                                    Details: <?= $request->details ?>
                                    <br>
                                    Accomodations: <?= $request->accomodations ?>
                                    <br>
                                    Start: 
                                    <?=formatDate($event[0]->start_date)?>                 
                                    at <?=formatTime($event[0]->start_time)?>
                                    <br>
                                    End:   
                                        <?=formatDate($event[0]->start_date)?> 
                                        at <?=formatTime($event[0]->end_time)?>
                                    <br>
                                    Max Attendees: <?= $event[0]->max ?>
                                    <br>
                                    Status: 
                                    <?php
                                        switch($request->status){
                                            case -1: echo "Denied"; break;
                                            case 0: echo "Under Revision"; break;
                                            case 1: echo "Accepted"; break;
                                        }
                                    ?>
                                    <br><br>
                                    @if(Auth::user()->email === \Config::get('constants.super_admin'))
                                        <a href="{{ route('authorize', $event[0]->id ) }}"><button class="btn btn-success">Authorize</button></a><br><br>   
                                        <a href="{{ route('deny', $event[0]->id ) }}"><button class="btn btn-danger">Deny</button></a><br>
                                    @else
                                        <a href="{{ route('delete_request', $event[0]->id ) }}"><button class="btn btn-danger pull-center">Delete</button></a><br>
                                    @endif
                                    <br><br>
                                    </div>
                        <?php }}} ?>
                        
                    </div>
                </div>  
            </section>
        </div>
    </div> 
</div>

@endsection