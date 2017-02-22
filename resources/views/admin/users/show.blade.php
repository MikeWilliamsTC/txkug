@extends('layouts.app')

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            User Profile
        @endslot
    @endcomponent

    @component('sections.admin-layout')

        @slot('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    </div>
                    <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $user->social->avatar_192 }}" class="img-responsive">
                </div>

                <div class="col-md-9">
                    <p>
                        @if ( $user->social->title  ) {{ $user->social->title }} <br /> @endif
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a><br />
                        Role: @if ( $user->roles[0]->id == 2 ) Admin @else User @endif <br />
                        Joined: {{ $user->created_at->format('l d, Y') }}
                    </p>
                </div>
            </div>

            <div class="row c-margin-t-20">
                <div class="col-md-12">
                    <h2>Event Attendance</h2>
                    <p>
                        {{ $user->first_name }} has attended  {{ $user->participations->count() }} {{ str_plural('event', $user->participations->count()) }}
                    </p>

                    @if($user->participations->count() > 0 )
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-hover">
                                <thead class="c-theme-bg">
                                    <tr>
                                        <th class="c-font-white">Event</th>
                                        <th class="c-font-white">Venue</th>
                                        <th class="c-font-white">Date & Time</th>
                                        <th class="c-font-white">Check-In Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($user->participations as $attendance)
                                    <tr>
                                        <td><a href="/admin/events/{{ $attendance->events->event_type->slug }}">{{ $attendance->events->event_type->event_type }}</td>
                                        <td><a href="/admin/venues/{{ $attendance->events->venue->slug }}">{{ $attendance->events->venue->venue_name }}</a></td>
                                        <td>{{ $attendance->events->event_date->format('l F d, Y') }}</td>
                                        <td>{{ $attendance->created_at->format('h:i A') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        @endslot
    @endcomponent
@stop