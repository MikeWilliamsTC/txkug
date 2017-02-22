@extends('layouts.app')

@section('content')

    @component('sections.breadcrumbs')
            @slot('title')
            Event Venues
            @endslot
    @endcomponent

    @component('sections.admin-layout')
        @slot('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold">{{ $venue->venue_name }}</h3>
                    </div>
                    <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div id="event-map" class="c-border-red-3" style="height: 255px"></div>
                </div>

                <div class="col-md-8">
                    <h4 class="c-font-uppercase c-font-bold">
                        {{ $venue->venue_name}}
                        <span class="pull-right">
                            <a href="/admin/venues/{{ $venue->slug }}/edit" class="socicon-btn socicon-btn-circle socicon-sm c-bg-dark-1 c-font-white c-bg-green-2-hover tooltips" data-original-title="Edit Venue"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="socicon-btn socicon-btn-circle socicon-sm c-bg-dark-1 c-font-white c-bg-red-3-hover tooltipss" data-toggle="modal" data-target=".deleteVenueModal-{{ $venue->id }}" data-original-title="Delete Venue"><i class="fa fa-trash"></i></a>
                        </span>
                    </h4>

                    <p>
                        {{ $venue->street_address }}<br />
                        {{ $venue->city }}, {{ $venue->state }} {{ $venue->zip_code }}<br />
                        <span class="small text-muted">{{ $venue->lat }}, {{ $venue->lng }}</span>
                    </p>

                    @if($venue->venue_note)
                        <p>{!! $venue->venue_note !!}</p>
                    @endif
                </div>
            </div>


            <div class="row c-margin-t-40">
                <div class="col-md-12">
                    <h2>Hosted Events</h2>
                    <p>
                        {{ $venue->venue_name }} has hosted {{ $venue->events->count() }} {{ str_plural('event', $venue->events->count()) }}
                    </p>

                    @if($venue->events->count() > 0 )
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-hover">
                                <thead>
                                <tr class="c-theme-bg">
                                    <th class="c-font-white">Event</th>
                                    <th class="c-font-white">Date</th>
                                    <th class="c-font-white c-center">Attendees</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($venue->events as $event)
                                    <tr>
                                        <td><a href="/admin/events/{{ $event->slug }}">{{ $event->event_type->event_type }}</a></td>
                                        <td>{{ $event->event_date->format('m/j/Y') }}</td>
                                        <td class="c-center">{{ $event->participants->count() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>


            <div class="modal fade deleteVenueModal-{{ $venue->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteVenueModal-{{ $venue->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Delete this venue?</h4>
                        </div>
                        {!! Form::model($venue, ['route' => ['admin.venues.destroy', $venue->id], 'method' => 'DELETE']) !!}
                        <div class="modal-body">
                            <div class="alert alert-danger" role="alert">
                                Deleting a venue will also delete all of its events, including any attendance records associated with the event.
                            </div>
                            <p>
                                Are you sure you want to delete the event venue <span class="c-font-bold">{{ $venue->venue_name }}</span>?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Yes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        @endslot
    @endcomponent

@stop

@section('footer_scripts')

    <script>
        function initMap() {

            var eventMap = new google.maps.Map(document.getElementById('event-map'), {
                zoom: 13,
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