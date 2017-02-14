@extends('layouts.app')

@section('content')

    <h3>Event Venue Detail</h3>

    <hr class="mt-1 mb-2">

    <div class="row">
        <div class="col-md-4 mb-1">
            <div id="event-map" class="z-depth-1 map-container" style="height: 375px"></div>
        </div>

        <div class="col-md-8">
            <p>
                <span class="font-weight-bold">{{ $venue->venue_name }}<br /></span>
                {{ $venue->street_address }}<br />
                {{ $venue->city }}, {{ $venue->state }} {{ $venue->zip_code }}<br />
                <span class="small text-muted">{{ $venue->lat }}, {{ $venue->lng }}</span>
            </p>

            @if($venue->venue_note)
                <hr class="mt-1 mb-1" >
                <p>{!! $venue->venue_note !!}</p>
            @endif

            <hr class="mt-1 mb-1" >

            <p>
                This venue has hosted {{ $venue->events->count() }} {{ str_plural('event', $venue->events->count()) }}.
            </p>

            @if($venue->events->count() > 0 )
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-hover">
                        <thead class="thead stylish-color text-white">
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th style="text-align:center;">Attendees</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($venue->events as $event)
                            <tr>
                                <td><a href="/admin/events/{{ $event->slug }}">{{ $event->event_name }}</a></td>
                                <td>{{ $event->event_date->format('m/j/Y') }}</td>
                                <td style="text-align:center;">{{ $event->participants->count() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

@stop

@section('footer_scripts')

    <script>
        function initMap() {

            var eventMap = new google.maps.Map(document.getElementById('event-map'), {
                zoom: 14,
                center: {lat: {{ $venue->lat }}, lng: {{ $venue->lng }} },
                mapTypeId: 'roadmap'
            });

            var eventMarker = new google.maps.Marker({
                position: {lat: {!! $venue->lat !!}, lng: {!! $venue->lng !!} },
                map: eventMap,
            });

            var eventCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.15,
                map: eventMap,
                center: {lat: {!! $venue->lat !!}, lng: {!! $venue->lng !!}},
                radius: 250
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_8gi6VR7JrziC3Rq1ArFF92JR_4pSbt4&callback=initMap"></script>

@stop