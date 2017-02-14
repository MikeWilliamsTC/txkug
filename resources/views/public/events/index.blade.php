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
            <div id='events-calendar'></div>
        </div>
    </div>

@stop

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <script>

//        $(document).ready(function() {

            $('#events-calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: false, // allow "more" link when too many events
                events: [
                    {title:'Training Day', start:'2017-02-14', end:'2017-02-14'},
                    {title:'TXKUG Monthly Meeting', color: 'red', textColor: 'white', start:'2017-02-24', end:'2017-02-240'},
                ]
            });

//        });

    </script>
@stop
