@extends('layouts.app')

@section('content')

    <div class="row mb-3">
        <div class="col-12 col-sm-2">
            <img src="{{ $user->social->avatar_192 }}" class="img-fluid z-depth-3">
        </div>
        <div class=" col-12 col-sm-10">
            <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
            <p>{{ $user->social->title }}</p>
            <div class="personal-sm">
                <a class="email-ic"><i class="fa fa-home"> </i></a>
                <a class="fb-ic"><i class="fa fa-facebook"> </i></a>
                <a class="tw-ic"><i class="fa fa-twitter"> </i></a>
                <a class="gplus-ic"><i class="fa fa-google-plus"> </i></a>
                <a class="li-ic"><i class="fa fa-linkedin"> </i></a>
                <a href="mailto:{{ $user->email }}" class="email-ic"><i class="fa fa-envelope-o"> </i></a>
            </div>
            <p>
                <span class="badge blue">Wordpress</span>
                <span class="badge blue">PHP</span>
                <span class="badge blue">MacOS</span>
                <span class="badge blue">Webdev</span>
            </p>
            <p>{{ $user->first_name }} has attended  {{ $user->participations->count() }} {{ str_plural('event', $user->participations->count()) }}</p>
        </div>
    </div>

    @if($user->participations->count() > 0 )
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-inverse">
                <tr>
                    <th>Event</th>
                    <th>Venue</th>
                    <th>Date & Time</th>
                    <th>Check-In Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user->participations as $attendance)
                    <tr>
                        <td>{{ $attendance->events->event_name }}</td>
                        <td>{{ $attendance->events->venue->venue_name }}</td>
                        <td>{{ $attendance->events->event_date->format('M d, Y') }} {{ $attendance->events->starts_at->format('h:i A') }} - {{ $attendance->events->stops_at->format('h:i A') }}</td>
                        <td>{{ $attendance->created_at->format('h:i A') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@stop
