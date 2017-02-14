@extends('layouts.app')

@section('header_scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.min.css" />
@stop

@section('content')

    <h3>Events Calendar </h3>
    <hr class="mb-2" />

    <div class="row">
        <div class="col-md-12">
            <div id='calendar'></div>
        </div>
    </div>

@stop

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <script>
        $('#calendar').fullCalendar({
            // put your options and callbacks here
        })
    </script>
@stop
