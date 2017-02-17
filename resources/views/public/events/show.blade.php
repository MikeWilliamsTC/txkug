@extends('layouts.app')

@section('header_scripts')

@stop

@section('content')

    <h3>{{ $event->event_type->event_type }}</h3>
    <h5>{{ $event->event_title }}</h5>

    <hr class="mb-1" />

    <div class="row">
        <div class="col-md-6">
            <p>
                {{ $event->event_date->format('l F d, Y') }} from
                {{ $event->starts_at->format('h:i A') }} - {{ $event->stops_at->format('h:i A') }}<br />
            </p>

            <div class="card z-depth-1">
                <div class="view overlay hm-white-slight">
                    <img src="/img/rainbow-fiber.jpg" class="img-responsive" alt="{{ $event->event_title }}">
                </div>
                <div class="card-block">
                    <h4 class="card-title">{{ $event->event_title }}</h4>
                    <hr>
                    <p class="card-text">{!! $event->event_description !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <p>

                {{ $event->venue->venue_name }}
            </p>
            <div class="card z-depth-1">
                <div id="event-map" class="z-depth-1 map-container" style="height: 375px"></div>
            </div>
        </div>
    </div>



@stop

@section('footer_scripts')

    <script>
        function initMap() {

            var eventMap = new google.maps.Map(document.getElementById('event-map'), {
                zoom: 14,
                center: {lat: {{ $event->venue->lat }}, lng: {{ $event->venue->lng }} },
                mapTypeId: 'roadmap'
            });

            var eventMarker = new google.maps.Marker({
                position: {lat: {!! $event->venue->lat !!}, lng: {!! $event->venue->lng !!} },
                map: eventMap,
            });

            var eventCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.15,
                map: eventMap,
                center: {lat: {!! $event->venue->lat !!}, lng: {!! $event->venue->lng !!}},
                radius: 250
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_8gi6VR7JrziC3Rq1ArFF92JR_4pSbt4&callback=initMap"></script>

@stop