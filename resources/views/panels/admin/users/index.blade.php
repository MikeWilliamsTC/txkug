@extends('layouts.app')


@section('content')

    <h3> Users </h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-hover">
            <thead class="thead stylish-color text-white">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th style="text-align:center;">Role</th>
                <th style="text-align:center;">Attendance</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <img src="{{ $user->social->avatar_32 }}">
                        <a href="{{ route('admin.users.show', $user->slug) }}">{{ $user->last_name }}, {{ $user->first_name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td style="text-align:center;">
                        <span class="switch">
                            <label>
                                User
                                @if ( $user->roles[0]->id == 2 )
                                    <input id="role-type" onclick='setRole( {{ $user->id }} );' checked type="checkbox">
                                    <span class="lever grey lighten-1"></span>
                                @else
                                    <input id="role-type" onclick='setRole( {{ $user->id }} );' type="checkbox">
                                    <span class="lever grey lighten-3"></span>
                                @endif
                                Admin
                            </label>
                        </span>
                    </td>
                    <td style="text-align:center;">
                        {{ $user->participations->count() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links('vendor.pagination.bootstrap-4') }}

@stop

@section('footer_scripts')
    <script>
        function setRole(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var chkBox = document.getElementById('role-type');

            if ( chkBox.checked) {
                var role_id = 2;
            }
            else {
                var role_id = 1;
            }


            $.ajax({
                method: 'POST',
                url: '/api/user',
                data: {'user_id': id, 'role_id': role_id },
                success: function(data){
                    console.log('User id: ' + id + ', Role id: ' + role_id);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    </script>

@stop
