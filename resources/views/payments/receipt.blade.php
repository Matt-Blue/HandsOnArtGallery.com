@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Event Receipt</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <?php foreach($event as $e){ ?>
                        <?php if(isset($e->image)){ ?>
                            <div class="col-md-4 text-center">
                                <img src="{{asset('public/img/' . $e->image)}}" alt="<?=$e->image?>" width="100%"/>
                            </div>                    
                            <div class="col-md-8 text-center">
                        <?php } else { ?>
                            <div class="col-md-12 text-center">
                        <?php } ?>                            
                            <div class="row">Name: <?php echo($e->name); ?></div>
                            <div class="row">Description: <?php echo($e->description); ?></div>
                            <div class="row">Type: <?php echo($e->type); ?></div>
                            <div class="row">Date: <?php echo($e->date); ?></div>
                            <div class="row">Start Time: <?php echo($e->start_time); ?></div>
                            <div class="row">End Time: <?php echo($e->end_time); ?></div>
                            <div class="row">Price: $<?php echo($e->price); ?></div>
                            <?php 
                                $user_id = Auth::user()->id;
                                $receipt =  DB::table('receipts')->where([
                                    ['event_id', '=', $e->id],
                                    ['user_id', '=', $user_id]
                                ])->get();
                                if(sizeof($receipt) != 0){
                            ?>
                                <?php foreach($receipt as $r){ ?>
                                    Time purchased: {{$r->created_at}}
                                <?php } ?>
                            <?php
                                }else{
                            ?>
                                <div class="row">No record of purchase</div>
                            <?php } ?>
                        <?php } ?>  
                    </div>
                </div>   
            </section>
        </div>
    </div>
</div>

@endsection