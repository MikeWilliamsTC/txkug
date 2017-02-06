@extends('layouts.app')

@section('content')

    <div class="card">
        <h4 class="card-header bg-primary white-text">Users</h4>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead blue-grey darken-1 text-white">
                    <tr>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th style="text-align:center;">User Role</th>
                        <th style="text-align:center;">Attendance</th>
                        <th style="text-align:center;">Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            {{--<td>--}}
                                {{--{{ Gravatar::get('aaron.jennings@tasd7.net'), 'small-secure' }}&d=https://a.slack-edge.com/66f9/img/avatars/ava_0011-32.png"--}}

                                {{--{{ Gravatar::get('aaron.jennings@tasd7.net') }}--}}
                                {{--<img src="{{ Gravatar::get('mike.williams@texarkanacollege.edu', 'small-secure') }}" />--}}

                                {{--<img src="{{ Gravatar::get('aaron.jennings@tasd7.net'), 'small-secure' }}" />--}}
                                {{--<img src="{{ Gravatar::get($user->email) }}&d=https%3A%2F%2Fa.slack-edge.com%2F66f9%2Fimg%2Favatars%2Fava_0012-32.png"/>--}}

                            {{--</td>--}}
                            <td>{{ $user->last_name }}, {{ $user->first_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="text-align:center;">
                                <span class="switch">
                                    <label>
                                        User
                                        @if ( $user->roles[0]->id == 2 )
                                            <input id="role-type" onclick='setRole( {{ $user->id }} );' checked type="checkbox">
                                            <span class="lever green lighten-4"></span>
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
                            <td style="text-align:center;">
                                <a href="/admin/users/{{ $user->slug }}" class="green-text"><i class="fa fa-arrow-right"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>



@stop

@section('footer')
    <script>
        function setRole (id) {

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
//                success: function(data){
//                    document.getElementById("check-in-msg").innerHTML = "<strong class='green-text'>You Are Checked In!</strong>";
//
//                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    </script>

@stop
