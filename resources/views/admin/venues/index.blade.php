@extends('layouts.app')

@section('header_scripts')
    <link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
@stop

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Event Venues
        @endslot
    @endcomponent

    @component('layouts.admin-layout')
        @slot('content')
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Venue List</h3>
            </div>
            <div class="c-content-divider c-divider-sm c-theme-bg"></div>

            <div class="table-responsive">
                <table id="venues-table" class="table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr class="c-theme-bg">
                            <th class="all c-font-white">Venue Name</th>
                            <th class="min-tablet c-font-white">Address</th>
                            <th class="min-tablet c-font-white c-center">Events</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($venues as $venue)
                        <tr>
                            <td><a href="/admin/venues/{{ $venue->slug }}">{{ $venue->venue_name }}</a></td>
                            <td>{{ $venue->street_address }} {{ $venue->city }} {{ $venue->state }} {{ $venue->zip_code }}</td>
                            <td class="c-center">{{ $venue->events->count() }}</td>
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
    <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('#venues-table').DataTable({
                order: [[ 0, "asc" ]],
                responsive: true
            });
        });
    </script>
@stop