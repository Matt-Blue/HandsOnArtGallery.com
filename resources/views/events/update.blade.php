@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

@if(Auth::user()->email === Config::get('constants.super_admin'))

<!-- Retrieve Compacted Event(s) With Helper Function -->
<?php $attributes = get_attributes($event); ?>

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
                        <h1>Update Event</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">    
                        <a href="{{ url('event/delete/'.$attributes['id']) }}"><button class="btn btn-danger pull-right">Delete</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- UPDATE FORM -->
                        {!! Form::open(['url' => '/event/update/'.$attributes['id']]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', $attributes['name'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', $attributes['description'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', [
                                'open' => 'Walk-In Studio',
                                'workshop' => 'Workshop',
                                'party' => 'Party'
                            ], $attributes['type']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('date', 'Date') !!}
                            {!! Form::date('date', $attributes['date'], ['class' => 'date']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('start_time', 'Start Time') !!}
                            {!! Form::text('start_time', $attributes['start_time'], ['id' => 'timepicker_start', 'autocomplete' => 'off']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_time', 'End Time') !!}
                            {!! Form::text('end_time', $attributes['end_time'], ['id' => 'timepicker_end', 'autocomplete' => 'off']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}
                            {!! Form::number('price', $attributes['price']) !!}
                        </div>

                        {!! Form::hidden('id', $attributes['id']) !!}
                        {!! Form::hidden('image', $attributes['image']) !!}
                        {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}
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