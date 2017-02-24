@extends('layouts.app')

@section('header_scripts')
    <link href="{{ asset('assets/plugins/datatables/media/css/datatables.bootstrap.min.css') }}" rel="stylesheet" />
@stop

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Users
        @endslot
    @endcomponent

    @component('sections.admin-layout')

        @slot('content')

            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">User List</h3>
            </div>

            <div class="table-responsive">
                <table id="users-table" class="table table-hover table-striped table-hover">
                    <thead class="c-theme-bg">
                        <tr>
                            <th class="c-font-white">Name</th>
                            <th class="c-font-white c-center">Role</th>
                            <th class="c-font-white c-center">Joined</th>
                            <th class="c-font-white c-center">Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img class="img-circle c-margin-r-40" src="{{ $user->social->avatar_32 }}">
                                <a href="{{ route('admin.users.show', $user->slug) }}">{{ $user->last_name }}, {{ $user->first_name }}</a>
                            </td>
                            <td class="c-center">
                                @if ( $user->roles[0]->id == 2 )
                                    <span class="c-font-red-3 c-font-bold">Admin</span>
                                @else
                                    User
                                @endif
                            </td>
                            <td class="c-center">
                                {{ $user->created_at->format('m-d-Y') }}
                            </td>
                            <td class="c-center">
                                {{ $user->participations->count() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links('vendor.pagination.custom-round') }}

        @endslot
    @endcomponent

@stop

@section('footer_scripts')
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@stop

