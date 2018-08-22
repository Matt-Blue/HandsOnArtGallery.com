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
                <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->

                    <h1 class="text-center">Hours & Calendar</h1>

                    <br>

                    <!-- Hours -->

                    <div class="row" style="padding-top 5px;">
                        <div class="12u 12u$(medium)">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Event Type</th>
                                            <th>Weekdays</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Open Studio</td>
                                            <td>Tuesday - Saturday</td>
                                            <td>12:00pm - 5:00pm</td>
                                        </tr>													
                                        <tr>
                                            <td>Workshops (Scheduled)</td>
                                            <td>Tuesday - Sunday</td>
                                            <td>9:00am - 9:00pm</td>
                                        </tr>													
                                        <tr>
                                            <td>Parties (Requested)</td>
                                            <td>Tuesday - Sunday</td>
                                            <td>9:00am - 9:00pm</td>
                                        </tr>													
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="4u 12u$(medium)">                    
                            <p><header class="major">*Parties can be scheduled from 9am-9pm depending on availability</header></p>
                        </div>
                        <div class="4u 12u$(medium)">
                            <p><header class="major">*Off-site parties can be arranged</header></p>
                        </div>
                        <div class="4u 12u$(medium)">
                            <p><header class="major">*Open studio time will be closed if a private party is scheduled</header></p>
                        </div>
                    </div>

                    <br>

                    <!-- Calendar -->

                    <div id='calendar'></div>

                    <script>
                        $(document).ready(function() {
                            // page is now ready, initialize the calendar...
                            $('#calendar').fullCalendar({
                                // put your options and callbacks here
                                events : [
                                    @foreach($events as $event)
                                        @if($event->type == "party")
                                            <?php $request = \App\Request::find($event->id); ?>
                                            @if($request)
                                                @if($request->status == 1)
                                                {                            
                                                    title : '{{ $event->name }}',
                                                    start : '{{ $event->start_date }}T{{ $event->start_time }}',
                                                    end : '{{ $event->end_date }}T{{ $event->end_time }}',
                                                    color: '#fed586',
                                                    textColor: '#434b56',
                                                    url : '{{ 'event/view/'.$event->id }}'
                                                },
                                                @endif
                                            @else
                                                {                            
                                                    title : '{{ $event->name }}',
                                                    start : '{{ $event->start_date }}T{{ $event->start_time }}',
                                                    end : '{{ $event->end_date }}T{{ $event->end_time }}',
                                                    color: '#fed586',
                                                    textColor: '#434b56',
                                                    url : '{{ 'event/view/'.$event->id }}'
                                                },
                                            @endif
                                        @else
                                            {                            
                                                title : '{{ $event->name }}',
                                                start : '{{ $event->start_date }}T{{ $event->start_time }}',
                                                end : '{{ $event->end_date }}T{{ $event->end_time }}',
                                                @if($event->type == 'workshop')
                                                    color: '#4cabb1',
                                                @else
                                                    color: '#79d1b8',
                                                @endif
                                                textColor: '#434b56',
                                                url : '{{ 'event/view/'.$event->id }}'
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
                            <h3>Open studio is every day unless an event is already scheduled.  
                            All events can be found in the <a href="{{ route('calendar') }}">calendar</a>.
                            If you would like to request a party of your own please visit your <a href="{{ route('dashboard') }}">dashboard</a>.
                            </h3>
                        </div>
                    </div>

                    <div class="text-center">                    
                        <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
                        @if (Auth::user())
                            <a href="{{ route('dashboard') }}" class="btn btn-success">Dashboard</a></li>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection