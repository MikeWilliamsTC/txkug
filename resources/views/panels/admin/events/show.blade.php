@extends('layouts.app')

@section('content')

    <h3>{{ $event->event_name }}</h3>

    <hr class="mb-1" />

    <p>
        <i class="fa fa-calendar pr-3"></i>{{ $event->event_date->format('l F d, Y') }} from
        {{ $event->starts_at->format('h:i A') }} - {{ $event->stops_at->format('h:i A') }}<br />
        <i class="fa fa-map-marker pl-1 pr-3"></i><a href="/admin/venues/{{ $event->venue->slug }}">{{ $event->venue->venue_name }}</a>
    </p>

    <div class="row">
        <div class="col-md-8">
            <div class="card z-depth-1">
                <div class="card-header stylish-color white-text">
                    {{ $event->event_title }}
                </div>
                <div class="card-block">
                    {!! $event->event_description !!}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card z-depth-1">
                <div class="card-header stylish-color white-text">
                    Event Attendees
                </div>
                <div class="card-block">
                    <ul>
                        @foreach ($event->participants as $attendee )
                            <li><a href="/admin/users/{{ $attendee->user->slug }}">{{ $attendee->user->last_name }}, {{ $attendee->user->first_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop