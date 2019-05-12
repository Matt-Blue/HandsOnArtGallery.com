@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

@if(Auth::user()->email === Config::get('constants.super_admin'))

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                
                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if($update)
                            <h1>Update Event</h1>
                        @else
                            <h1>Create Event</h1>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 align-center">
                        <a href="{{ url('/dashboard') }}"><button class="btn btn-success">Dashboard</button></a>
                    </div>
                </div>
                @if($update)
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">    
                            <a href="{{ url('event/delete/'.$event->id) }}"><button class="btn btn-danger pull-right">Delete</button></a>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- UPDATE FORM -->
                        @if($update)
                            {!! Form::open(['url' => '/event/update/'.$event->id]) !!}
                        @else
                            {!! Form::open(['route' => 'create','files' => 'true']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            @if($update)
                                {!! Form::text('name', $event->name, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::text('name', null, ['class' => 'form-control'], array('required' => 'required')) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}                            
                            @if($update)
                                {!! Form::textarea('description', $event->description, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            @if($update)
                                {!! Form::select('type', [
                                    'open' => 'Walk-In Studio',
                                    'workshop' => 'Workshop',
                                    'party' => 'Party'
                                ], $event->type) !!}
                            @else
                                {!! Form::select('type', [
                                    'workshop' => 'Workshop',
                                    'party' => 'Party',
                                    'closed' => 'Closed'
                                ], 0) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('date', 'Date') !!}
                            @if($update)
                                {!! Form::date('date', $event->date, ['class' => 'date']) !!}
                            @else
                                {!! Form::date('date', NULL, ['class' => 'date']) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('start_time', 'Start Time') !!}
                            @if($update)
                                {!! Form::text('start_time', $event->start_time, ['id' => 'timepicker_start', 'autocomplete' => 'off']) !!}
                            @else
                                {!! Form::text('start_time', NULL, ['id' => 'timepicker_start', 'autocomplete' => 'off']) !!}
                            @endif                            
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_time', 'End Time') !!}
                            @if($update)
                                {!! Form::text('end_time', $event->end_time, ['id' => 'timepicker_end', 'autocomplete' => 'off']) !!}
                            @else
                                {!! Form::text('end_time', NULL, ['id' => 'timepicker_end', 'autocomplete' => 'off']) !!}
                            @endif                            
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}
                            @if($update)
                                {!! Form::number('price', $event->price) !!}
                            @else
                                {!! Form::number('price', 30) !!}
                            @endif
                        </div>
                        
                        @if($update)
                            {!! Form::hidden('id', $event->id) !!}
                            {!! Form::hidden('image', $event->image) !!}
                            {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}
                        @else
                            <div class="form-group">
                                {!! Form::label('image', 'Image') !!}
                                {!! Form::file('image', array('class' => 'image')) !!}
                                {{ csrf_field() }}
                            </div>
                            {!! Form::submit('Create', ['class' => 'btn btn-primary pull-right']) !!}
                        @endif

                        
                        
                        <a href="{{ route('calendar') }}"><button class="btn btn-default pull-right">Cancel</button></a>
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

@else
<?php redirect()->route('calendar'); ?>
@endif

@endsection