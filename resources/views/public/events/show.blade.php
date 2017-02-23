@extends('layouts.app')

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Events
        @endslot
    @endcomponent

    @component('sections.public-layout')
        @slot('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold">{{ $event->event_type->event_type }}</h3>
                        <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    @include('sections.event-detail')
                </div>

                <div class="col-md-4">
                    <div id="event-map" class="z-depth-1 map-container" style="min-height: 250px">
                </div>
            </div>

        @endslot
    @endcomponent

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