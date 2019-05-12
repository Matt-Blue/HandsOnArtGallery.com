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
                            <h1>Update Artwork</h1>
                        @else
                            <h1>Create Artwork</h1>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if($update)
                            {!! Form::open(['url' => '/gallery/update/'.$artwork->id]) !!}
                        @else
                            {!! Form::open(['url' => '/gallery/new/','files' => 'true']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            @if($update)
                                {!! Form::text('name', $artwork->name, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::text('name', null, ['class' => 'form-control'], array('required' => 'required')) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}                            
                            @if($update)
                                {!! Form::textarea('description', $artwork->description, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('width', 'Width') !!}
                            @if($update)
                                {!! Form::number('width', $artwork->width, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::number('width', null, ['class' => 'form-control'], array('required' => 'required')) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('height', 'Height') !!}
                            @if($update)
                                {!! Form::number('height', $artwork->height, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::number('height', null, ['class' => 'form-control'], array('required' => 'required')) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}
                            @if($update)
                                {!! Form::number('price', $artwork->price) !!}
                            @else
                                {!! Form::number('price', 30) !!}
                            @endif
                        </div>
                        
                        @if($update)
                            {!! Form::hidden('id', $artwork->id) !!}
                            {!! Form::hidden('image', $artwork->image) !!}
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

@else

    @if(isset($artwork))
        <h1>READ artwork</h1>
    @endif

@endif

@endsection