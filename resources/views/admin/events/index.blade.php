@extends('layouts.app')

@section('header_scripts')
    <link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css') }}" rel="stylesheet" />
@stop

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
            <div class="c-content-divider c-divider-sm c-theme-bg"></div>

            <div class="table-responsive">
                <table id='events-table' class="table table-hover table-striped table-bordered table-hover">
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
                            <td><a href="/admin/events/{{ $event->slug }}">{{ $event->event_date->format('Y-m-d') }}</a></td>
                            <td>{{ $event->event_type->event_type }}</td>
                            <td>{{ $event->venue->venue_name }}</td>
                            <td class="c-center">{{ $event->participants->count() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @endslot
    @endcomponent
@stop

@section('footer_scripts')
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/extensions/Buttons/js/buttons.bootstrap.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#events-table').DataTable({
                order: [[ 0, "desc" ]]
            });
        });
    </script>
@stop