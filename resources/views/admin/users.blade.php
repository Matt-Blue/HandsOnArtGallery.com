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
                        <h1>All Users</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 align-center">
                        <a href="{{ url('/dashboard') }}"><button class="btn btn-success">Dashboard</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><!-- READ REQUESTS -->
                        <?php 
                        if(!isset($users) || sizeof($users) === 0){ ?>
                            <div class="text-center">                            
                                There are no future users!<br><br>                                
                            </div>
                        <?php } else { 
                            foreach($users as $user){ 
                            ?>
                                <div class="col-md-4 text-left">
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