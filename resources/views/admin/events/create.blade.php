@extends('layouts.app')

@section('header_scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">


@endsection

@section('content')
    @component('sections.breadcrumbs')
        @slot('title')
            Events
        @endslot
    @endcomponent

    @component('sections.admin-layout')
        @slot('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold">Add Event</h3>
                    </div>
                    <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    @include('errors.error')

                    {!! Form::open(['route' => ['admin.events.store'], 'files' => true, 'class' => 'form-horizontal']) !!}
                        @include('admin.events.form')
                    {!! Form::close() !!}

                </div>
            </div>

        @endslot
    @endcomponent

@stop

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#event-description').summernote({
                height: 225
            });

//            $('.event_date').pickadate({
//                format: 'yyyy-mm-dd'
//            });
//            $('.starts_at').pickatime({
//                twelvehour: false
//            });
//            $('.stops_at').pickatime({
//                twelvehour: false
//            });

        });
    </script>

@stop
