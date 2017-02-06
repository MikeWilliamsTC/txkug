@extends('layouts.app')

@section('content')

    <h3 class="mt-3">Attendance Record for {{ $user->first_name }} {{ $user->last_name }}</h3>

    @if ($user->participations->count() > 0 )
        <div class="mb-2">
            You have attended {{ $user->participations->count() }} {{ str_plural('event', $user->participations->count()) }}
        </div>

        @if($user->participations->count() > 0 )
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Date & Time</th>
                        <th>My Check-In Time</th>
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
    @else
        <div class="mb-2">
            You have not attended any events.
        </div>
    @endif

@stop