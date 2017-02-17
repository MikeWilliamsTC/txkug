@extends('layouts.app')

@section('content')

    <h3>Add Event</h3>

    <hr class="mt-1 mb-2">

    @include('errors.error')

    {!! Form::open(['route' => ['admin.events.store'], 'class' => 'form-horizontal']) !!}
        @include('panels.admin.events.form')
    {!! Form::close() !!}

@stop

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('.event-type-select').material_select();
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
