@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Request Details</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- CREATE FORM -->
                        {!! Form::open(['route' => 'create_request', 'required']) !!}

                        <div class="form-group">
                            {!! Form::label('details', 'Details') !!}
                            {!! Form::textarea('details', "Anything else you want us to know", ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('accomodations', 'Accomodations') !!}
                            {!! Form::textarea('accomodations', "If there are any special circumstances we should be aware of please write them here", ['class' => 'form-control', 'required']) !!}
                        </div>

                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                        {!! Form::hidden('event_id', $event_id) !!}
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>   
            </section>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( "#start_timepicker" ).timepicker();
    $( "#end_timepicker" ).timepicker();
</script>

@endsection