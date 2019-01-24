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
                        <h1>Create an Event</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- CREATE FORM -->
                        {!! Form::open(array(
                            'route' => 'create',
                            'files' => 'true'
                        )) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control'], array('required' => 'required')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', [
                                'workshop' => 'Workshop',
                                'party' => 'Party',
                                'closed' => 'Closed'
                            ], 0) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('image', 'Image') !!}
                            {!! Form::file('image', array('class' => 'image')) !!}
                            {{ csrf_field() }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('date', 'Date') !!}
                            {!! Form::date('date', NULL, ['class' => 'date']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('start_time', 'Start Time') !!}
                            {!! Form::text('start_time', NULL, ['id' => 'timepicker_start', 'autocomplete' => 'off']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_time', 'End Time') !!}
                            {!! Form::text('end_time', NULL, ['id' => 'timepicker_end', 'autocomplete' => 'off']) !!}
                        </div>

                        <!-- 
                            TODO 
                            select item to be painted based on what is in the database
                            can be no item (not required)
                        -->

                        {!! Form::submit('Create', ['class' => 'btn btn-primary pull-right']) !!}

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