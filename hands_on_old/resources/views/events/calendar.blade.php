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
                        <h1 class="text-center">Calendar</h1>

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
                                                        @if($event->type == 'party')
                                                            color: '#fed586',
                                                        @elseif($event->type == 'workshop')
                                                            color: '#4cabb1',
                                                        @else
                                                            color: '#79d1b8',
                                                        @endif
                                                        textColor: '#434b56',
                                                        url : '{{ 'event/view/'.$event->id }}'
                                                    },
                                                    @endif
                                                @endif
                                            @else
                                                {                            
                                                    title : '{{ $event->name }}',
                                                    start : '{{ $event->start_date }}T{{ $event->start_time }}',
                                                    end : '{{ $event->end_date }}T{{ $event->end_time }}',
                                                    @if($event->type == 'party')
                                                        color: '#fed586',
                                                    @elseif($event->type == 'workshop')
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
                                    //customization
                                })
                            });

                        </script>
                        </section>
                    </div>
        </div>
    </div>
</div>

@endsection