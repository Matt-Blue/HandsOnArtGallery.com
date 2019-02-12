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
                            <?php switch($event->type){
                                    case "open": echo "Walk-In Studio"; break;
                                    case "workshop": echo "Workshop"; break;
                                    case "party": echo "Party"; break;
                            } ?>
                        <br>
                        Start: 
                            <?=formatDate($event->date)?>                  
                            at <?=formatTime($event->start_time)?>
                        <br>
                        End:   
                            <?=formatDate($event->date)?> 
                            at <?=formatTime($event->end_time)?>
                        <br>
                        Number Attending: <?php echo DB::table('signups')->where('event_id', $event->id)->count('user_id'); ?>
                        <br>
                        <?php if($event->price != NULL){ echo("Price: $" . $event->price); }
                        else{ echo("Price: cost of materials"); }?>                        
                        <br>  

                        @if(Auth::user())

                            <!-- Check for signup -->
                            <?php
                                if(DB::table('signups')
                                ->where('user_id', '=', Auth::user()->id)
                                ->where('event_id', '=', $event->id)
                                ->exists()){
                                    $signed_up = true;
                                    echo "You have already signed up for this event.<br>";
                                }
                                else {
                                    $signed_up = false;
                            ?>
                                <a href="{{ url('signup/'.$event->id) }}"><button class="btn btn-warning pull-center">Signup</button></a><br>
                            <?php } ?>

                            <!-- Check for payment -->
                            <?php 
                            $user_id = Auth::user()->id;
                            $receipt =  DB::table('receipts')->where([
                                ['event_id', '=', $event->id],
                                ['user_id', '=', $user_id]
                            ])->get();
                            if(sizeof($receipt) != 0){
                                $user = DB::table('users')->where('id', '=', $user_id)->first();
                                foreach($receipt as $r){ ?>
                                    <br>Receipt
                                    <br>User: {{$user->name}}
                                    <br>Email: {{$user->email}}
                                    <br>Time purchased: {{$r->created_at}}
                                <?php }
                            }elseif($signed_up){?>
                                <div class="row">No record of purchase</div>
                                <a href="{{ url('pay/'.$event->id) }}"><button class="btn btn-success pull-center">Pay</button></a>
                            <?php } ?>

                        @else
                            <a href="{{ route('login') }}">Login</a> to sign up for this event
                        @endif
                        <br><br>
                        <a href="{{ route('calendar') }}"><button class="btn btn-warning pull-center">Calendar</button></a>
                        <a href="{{ route('dashboard') }}"><button class="btn btn-primary pull-center">Dashboard</button></a>
                    </div>
                </div>   
            </section>
        </div>
    </div>
</div>

@endsection