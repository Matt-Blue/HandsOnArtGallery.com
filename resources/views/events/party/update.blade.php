@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Update Party Request</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- UPDATE FORM -->
                        {!! Form::open(['route' => 'create', 'required']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',  $event->name, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', $event->description, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('start_date', 'Start Date') !!}
                            {!! Form::date('start_date', $event->start_date, ['class' => 'date', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('start_time', 'Start Time') !!}
                            {!! Form::text('start_time', $event->start_time, ['id' => 'timepicker_start', 'autocomplete' => 'off', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_time', 'End Time') !!}
                            {!! Form::text('end_time', $event->end_time, ['id' => 'timepicker_end', 'autocomplete' => 'off', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('max', 'Max Attendees') !!}
                            {!! Form::number('max', $event->max, ['class' => 'form-control', 'required']) !!}
                        </div>

                        {!! Form::hidden('type', 'party') !!}
                        {!! Form::hidden('price', -1) !!}
                        {!! Form::hidden('status', 0) !!}
                        {!! Form::submit('Request', ['class' => 'btn btn-primary pull-right']) !!}

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