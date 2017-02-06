@extends('layouts.app')

@section('content')

    <div class="card">
        <h4 class="card-header bg-primary white-text">Edit {{ $event->event_name }}</h4>
        <div class="card-block">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input:<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'PUT', 'files' => true, 'class' => 'form-inline']) !!}
                @include('panels.admin.events.form')
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('footer')

    <script>
        $(document).ready(function() {

            $('.venue-select').material_select();
            $('.event_date').pickadate({
                format: 'yyyy-mm-dd'
            });
            $('.starts_at').pickatime({
                twelvehour: false
            });
            $('.stops_at').pickatime({
                twelvehour: false
            });
        });
    </script>

@stop