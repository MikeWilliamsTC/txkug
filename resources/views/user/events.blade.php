@extends('layouts.app')

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            My Account
        @endslot
    @endcomponent

    @component('layouts.user-layout')

        @slot('content')

            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">My Events</h3>
            </div>
            <div class="c-content-divider c-divider-sm c-theme-bg"></div>

            @if ($user->attendance->count() > 0 )
                <h4>You have attended {{ $user->attendance->count() }} {{ str_plural('event', $user->attendance->count()) }}</h4>

                <div class="table-responsive">
                    <table id='events-table' class="table table-hover table-striped table-bordered table-hover">
                        <thead>
                        <tr class="c-theme-bg">
                            <th class="c-font-white">Date</th>
                            <th class="c-font-white">Event</th>
                            <th class="c-font-white">Venue</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->attendance as $attendance)
                                <tr>
                                    <td>{{ $attendance->events->event_date->format('Y-m-d') }}</td>
                                    <td>{{ $attendance->events->event_type->event_type }}</td>
                                    <td>{{ $attendance->events->venue->venue_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h4>You have not attended any events</h4>
            @endif

        @endslot
    @endcomponent

@stop