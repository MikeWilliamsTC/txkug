@extends('layouts.app')

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Events
        @endslot
    @endcomponent

    @component('sections.admin-layout')
        @slot('content')
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Event List</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-hover">
                    <thead>
                        <tr class="c-theme-bg">
                            <th class="c-font-white">Date</th>
                            <th class="c-font-white">Event Type</th>
                            <th class="c-font-white">Venue</th>
                            <th class="c-center c-font-white">Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><a href="/admin/events/{{ $event->slug }}">{{ $event->event_date->format('F j, Y') }}</a></td>
                            <td>{{ $event->event_type->event_type }}</td>
                            <td>{{ $event->venue->venue_name }}</td>
                            <td class="c-center">{{ $event->participants->count() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $events->links('vendor.pagination.custom-round') }}

        @endslot
    @endcomponent
@stop