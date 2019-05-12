@extends('layouts.app')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

<div class="container-fluid">
    <div class="row">
        <div class="wrapper" id="info">
            <div class="inner">
                <section class="main" style="background-color: #FCFCFC">
                    <!-- Calendar -->
                    <h1 class="text-center" style="margin-top: 0.5rem;">Calendar</h1>

                    <div class="text-center">
                        @if (Auth::user())
                            <a href="{{ route('dashboard') }}" class="btn btn-success">Dashboard</a></li>
                        @endif
                    </div>

                    <div id='calendar'></div>

                    <script>
                        $(document).ready(function() {
                            $('#calendar').fullCalendar({
                                // put your options and callbacks here
                                events : [
                                    @foreach($events as $event)
                                        @if($event->type == "party")                                            
                                            {
                                                title : '{{ $event->name }}',
                                                start : '{{ $event->date }}T{{ $event->start_time }}',
                                                end : '{{ $event->date }}T{{ $event->end_time }}',
                                                color: '#fed586',
                                                textColor: '#434b56',
                                                url : '{{ 'event/'.$event->id }}'
                                            },
                                        @elseif($event->type == "workshop")
                                            {                            
                                                title : '{{ $event->name }}',
                                                start : '{{ $event->date }}T{{ $event->start_time }}',
                                                end : '{{ $event->date }}T{{ $event->end_time }}',
                                                color: '#4cabb1',
                                                textColor: '#434b56',
                                                url : '{{ 'event/'.$event->id }}'
                                            },
                                        @else
                                            {
                                                title : 'Closed',
                                                start : '{{ $event->date }}T{{ $event->start_time }}',
                                                end : '{{ $event->date }}T{{ $event->end_time }}',
                                                color: '#79d1b8',
                                                textColor: '#434b56',
                                                @if(Auth::user() && Auth::user()->email === \Config::get('constants.super_admin'))
                                                    url : '{{ 'event/'.$event->id }}'
                                                @endif
                                            },
                                        @endif
                                    @endforeach
                                ]
                            })
                        });
                    </script>

                    <!-- Other Info -->
                    <div class="row">
                        <div class="12u 12u$(medium)">      
                            <h3>Walk-In studio is every day unless an event is already scheduled.  
                            All events can be found in the <a href="{{ route('calendar') }}">calendar</a>.
                            If you would like to request a party of your own please visit your <a href="{{ route('dashboard') }}">dashboard</a>.
                            </h3>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection