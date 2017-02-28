@extends('layouts.app')

@section('header_scripts')
    <link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
@stop

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Events
        @endslot
    @endcomponent

    @component('layouts.admin-layout')
        @slot('content')
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Event List</h3>
            </div>
            <div class="c-content-divider c-divider-sm c-theme-bg"></div>

            <table id='events-table' class="table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="c-theme-bg">
                    <th class="all c-font-white">Date</th>
                    <th class="all c-font-white">Event Type</th>
                    <th class="min-tablet c-font-white">Venue</th>
                    <th class="min-tablet c-center c-font-white">Attendees</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td><a href="/admin/events/{{ $event->slug }}">{{ $event->event_date->format('Y-m-d') }}</a></td>
                        <td>{{ $event->event_type->event_type }}</td>
                        <td>{{ $event->venue->venue_name }}</td>
                        <td class="c-center">{{ $event->attendees->count() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endslot
    @endcomponent
@stop

@section('footer_scripts')
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#events-table').DataTable({
                order: [[ 0, "desc" ]],
                responsive: true
            });
        });
    </script>
@stop