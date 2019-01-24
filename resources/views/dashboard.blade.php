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

<!-- ALL SIGNUPS -->
<div class="container-fluid" id="requests">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Upcoming Signups</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><!-- READ REQUESTS -->
                        <?php 
                        if(!isset($signups) || sizeof($signups) === 0){ ?>
                            <div class="text-center">                            
                                There are no future signups!<br><br>                                
                            </div>
                        <?php } else { 
                            foreach($signups as $s){ 
                                $event =  DB::table('events')->where('id', '=', $s->event_id)->get();
                                $user =  DB::table('users')->where('id', '=', $s->user_id)->get();
                                ?>
                                <div class="col-md-4 text-left">
                                    <?php foreach($event as $e){ ?>
                                        Event: <?=$e->name?><br>
                                        Date: <?=$e->date?><br>
                                    <?php } ?>
                                    <?php foreach($user as $u){ ?>
                                        User: <?=$u->name?><br>
                                        Email: <?=$u->email?><br><br><br>
                                    <?php } ?>
                                </div>
                            <?php }
                        } ?>
                        
                    </div>
                </div>  
            </section>
        </div>
    </div> 
</div>

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
                                            Price: cost of materials
                                            <br><br>
                                            <a href="{{ url('event/view/'.$e->id) }}"><button class="btn btn-success pull-center">View</button></a>
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

@endsection