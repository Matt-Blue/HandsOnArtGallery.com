@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<!-- Retrieve Compacted Event(s) With Helper Function -->
<?php
$attributes = get_attributes($event); 
?>

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1><?=$attributes['name']?></h1>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($attributes['image'])){ ?>
                        <div class="col-md-4 text-center">
                            <img src="{{asset('public/img/' . $attributes['image'])}}" alt="<?=$attributes['name']?>" width="100%"/>
                        </div>                    
                        <div class="col-md-8 text-center">
                    <?php } else { ?>
                        <div class="col-md-12 text-center">
                    <?php } ?>
                        <br><!-- READ EVENT -->
                        Description: <?=$attributes['description']?>
                        <br>
                        Event Type: 
                            <?php 
                                switch($attributes['type']){
                                    case "open": echo "Walk-In Studio"; break;
                                    case "workshop": echo "Workshop"; break;
                                    case "party": echo "Party"; break;
                                }
                            ?>
                        <br>
                        Start: 
                            <?=formatDate($attributes['date'])?>                  
                            at <?=formatTime($attributes['start_time'])?>
                        <br>
                        End:   
                            <?=formatDate($attributes['date'])?> 
                            at <?=formatTime($attributes['end_time'])?>
                        <br>
                        Attending: <?php echo DB::table('signups')->where('event_id', $attributes['id'])->count('user_id'); ?>
                        <br>
                        Price: cost of materials
                        <br>  
                        @if(Auth::user())          
                            <a href="{{ url('signup/'.$attributes['id']) }}"><button class="btn btn-warning pull-center">Signup</button></a><br>
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