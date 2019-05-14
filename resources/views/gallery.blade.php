@extends('layouts.app')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<style>
    img{ width: 100%; transition: all .2s ease-in-out; }
    img:hover{ transform: scale(0.9); }
    .wide_button{ width: 100%; }
    .row{ margin-bottom: 2rem; }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="wrapper" id="info">
            <div class="inner">
                <section class="main" style="background-color: #FCFCFC">

                    <h1 class="text-center">Gallery</h1>
                    <p class="text-center">Art for real people</p><br>

                    @if(Auth::user())
                        @if(Auth::user()->email === Config::get('constants.super_admin'))
                            <div class="row"><div class="col-md-12 align-center">
                                <a href="{{ url('/dashboard') }}"><button class="btn btn-success">Dashboard</button></a>
                            </div></div>
                        @endif
                    @endif

                    <!-- Navigation -->
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ url('/gallery/all') }}">Categories</a>
                            </div>
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('/gallery/all') }}">All</a></li>
                                <li><a href="{{ url('/gallery/canvases') }}">Canvases</a></li>
                                <li><a href="{{ url('/gallery/coconuts') }}">Coconuts</a></li>
                                <li><a href="{{ url('/gallery/wood') }}">Wood</a></li>
                                <li><a href="{{ url('/gallery/glass') }}">Glass</a></li>
                                <li><a href="{{ url('/gallery/fluid') }}">Fluid Painting</a></li>
                                <li><a href="{{ url('/gallery/customers') }}">Customers</a></li>
                                <li><a href="{{ url('/gallery/events') }}">Special Events</a></li>
                            </ul>
                        </div>
                    </nav>
                    <h3>Current Category: <?= $category ?></h3>

                    <!-- Display all artworks -->
                    @if(sizeof($artworks) === 0)
                        <p>No items to display</p>
                    @else
                        <div class="row">                        
                            <?php 
                                $column = 1;
                                foreach($artworks as $artwork){
                                ?>
                                    <div class="col-md-3">
                                        <!-- Image -->
                                        <a href='{{url("gallery/view/" . $artwork->id)}}'>
                                            <img src='{{asset("public/img/" . $artwork->image)}}'>
                                        </a>
                                        <!-- Name / Description -->
                                        <div class="col-md-12 text-center">
                                            <b><?= $artwork->name ?></b><br> 
                                            <?= $artwork->description ?>
                                        </div>
                                        <!-- View & Buy Buttons -->
                                        @if($update)
                                            <div class="row">
                                                <div class="col-md-6"><button class="btn btn-warning wide_button">Edit</button></div>
                                                <div class="col-md-6"><button class="btn btn-danger wide_button">Delete</button></div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-6"><button class="btn btn-primary wide_button">View</button></div>
                                                <div class="col-md-6"><button class="btn btn-success wide_button">Buy</button></div>
                                            </div>
                                        @endif
                                    </div>                                
                                <?php
                                    if($column == 4){
                                        echo('</div><div class="row">');
                                        $column = 0;
                                    }
                                    $column += 1;
                                }
                            ?>
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
</div>

@endsection