@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Error in signup: </h1><br>
                        <p><?php echo $error;  ?></p>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <br>
                        <center><a href="{{ route('calendar') }}"><button class="btn btn-default pull-center">Back to Calendar</button></a></center>
                    </div>
                </div>   
            </section>
        </div>
    </div>
</div>

@endsection