@extends('layouts.app')

@section('header_scripts')
    <link href="{{ asset('assets/plugins/datatables/media/css/datatables.bootstrap.min.css') }}" rel="stylesheet" />
@stop

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Event Venues
        @endslot
    @endcomponent

    @component('sections.admin-layout')
        @slot('content')
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Venue List</h3>
            </div>

            <div class="table-responsive">
                <table id="venues-table" class="table table-hover table-striped table-hover">
                    <thead>
                        <tr class="c-theme-bg">
                            <th class="c-font-white">Venue Name</th>
                            <th class="c-font-white">Address</th>
                            <th class="c-font-white c-center">Events</th>
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
            {{ $venues->links('vendor.pagination.custom-round') }}

        @endslot
    @endcomponent
@stop

@section('footer_scripts')
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#venues-table').DataTable({
                "order": [[ 0, "asc" ]]
            });
        });
    </script>
@stop