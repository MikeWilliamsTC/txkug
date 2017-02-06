@extends('layouts.app')

@section('content')

    <div class="card">
        <h4 class="card-header bg-primary white-text">Event Detail</h4>
        <div class="card-block">
            <h4 class="font-weight-bold">{{ $event->event_name }}</h4>
            <hr />
            {{ $event->venue->venue_name }}<br />
            {{ $event->event_date->format('l F d, Y') }}<br />
            {{ $event->starts_at->format('h:i A') }} - {{ $event->stops_at->format('h:i A') }}<br />
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <div class="card blue-grey darken-2 z-depth-1">
                        <div class="card-block">
                            <h4 class="text-white">{{ $event->event_title }}</h4>
                            <hr class="white">
                            <p class="text-white">{!! $event->event_description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card blue-grey lighten-5 z-depth-1">
                        <div class="card-block">
                            <h4>Attendees</h4>
                            <hr />
                            <ul>
                                @foreach ($event->participants as $attendee )
                                    <li><a href="/admin/users/{{ $attendee->user->slug }}">{{ $attendee->user->last_name }}, {{ $attendee->user->first_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop