@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1><?=$event->name?></h1>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($event->image)){ ?>
                        <div class="col-md-4 text-center">
                            <img src="{{asset('public/img/' . $event->image)}}" alt="<?=$event->name?>" width="100%"/>
                        </div>                    
                        <div class="col-md-8 text-center">
                    <?php } else { ?>
                        <div class="col-md-12 text-center">
                    <?php } ?>
                        <br><!-- READ EVENT -->
                        Description: <?=$event->description?>
                        <br>
                        Event Type: 
                            <?php 
                                switch($event->type){
                                    case "open": echo "Walk-In Studio"; break;
                                    case "workshop": echo "Workshop"; break;
                                    case "party": echo "Party"; break;
                                }
                            ?>
                        <br>
                        Start: 
                            <?=formatDate($event->date)?>                  
                            at <?=formatTime($event->start_time)?>
                        <br>
                        End:   
                            <?=formatDate($event->date)?> 
                            at <?=formatTime($event->end_time)?>
                        <br>
                        Attending: <?php echo DB::table('signups')->where('event_id', $event->id)->count('user_id'); ?>
                        <br>
                        <?php if($event->price != NULL){ echo("Price: $" . $event->price); }
                        else{ echo("Price: cost of materials"); }?>                        
                        <br>  
                        @if(Auth::user())
                            <?php
                                if(DB::table('signups')
                                ->where('user_id', '=', Auth::user()->id)
                                ->where('event_id', '=', $event->id)
                                ->exists()){ echo "You have already signed up for this event."; }
                                else {
                            ?>
                                <a href="{{ url('signup/'.$event->id) }}"><button class="btn btn-warning pull-center">Signup</button></a><br>
                            <?php } ?>
                        @else
                            <a href="{{ route('login') }}">Login</a> to sign up for this event
                        @endif
                        <br>
                        <a href="{{ route('calendar') }}"><button class="btn btn-default pull-center">Back to Calendar</button></a>
                    </div>
                </div>   
            </section>
        </div>
    </div>
</div>

@endsection