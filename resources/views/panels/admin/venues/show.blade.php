@extends('layouts.app')

@section('content')

    <div class="card">
        <h4 class="card-header bg-primary white-text">Venue Detail</h4>
        <div class="card-block">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold">{{ $venue->venue_name }}</h4>
                    <p>
                        {{ $venue->street_address }}<br />
                        {{ $venue->city }}, {{ $venue->state }} {{ $venue->zip_code }}
                    </p>

                    <p>
                        <span class="font-weight-bold">Latitude:</span> {{ $venue->lat }}<br />
                        <span class="font-weight-bold">Longitude:</span> {{ $venue->lng }}
                    </p>

                    @if($venue->venue_note)
                        <p><span class="font-weight-bold">Note:</span> <br />{{ $venue->venue_note }}</p>
                    @endif

                </div>

                <div class="col-md-6">
                    <div id="event-map" class="z-depth-1 map-container" style="height: 275px"></div>
                </div>
            </div>

            <hr class="mt-2 mb-2"/>

            <div class="row">
                <div class="col-md-12">
                    <h4>Venue Events</h4>
                    <p>The following events were held at this venue</p>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead class="thead blue-grey darken-1 text-white">
                            <tr>
                                <th>Event</th>
                                <th>Date & Time</th>
                                <th>Attendees</th>
                                <th style="text-align:center;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($venue->events as $event)
                                <tr>
                                    <td>{{ $event->event_name }}</td>
                                    <td>{{ $event->event_date->format('l F j, Y') }} {{ $event->starts_at->format('h:i A') }} - {{ $event->stops_at->format('h:i A') }}</td>
                                    <td style="text-align:center;">{{ $event->participants->count() }}</td>
                                    <td style="text-align:center;">
                                        <a href="/admin/events/{{ $event->slug }}" class="green-text"><i class="fa fa-arrow-right"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

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