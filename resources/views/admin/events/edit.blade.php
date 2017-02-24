@extends('layouts.app')

@section('header_scripts')
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-timepicker/jquery.timepicker.css') }}" rel="stylesheet" />
@endsection

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Event Venues
        @endslot
    @endcomponent

    @component('layouts.admin-layout')
        @slot('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold">Edit Event</h3>
                    </div>
                    <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    @include('errors.error')

                    {!! Form::model($event, ['route' => ['admin.events.update', $event->slug], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal']) !!}
                        @include('admin.events.form')
                    {!! Form::close() !!}
                </div>
            </div>
        @endslot
    @endcomponent

@stop

@section('footer_scripts')
    <script src="{{ asset('assets/plugins/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-timepicker/jquery.timepicker.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#event-description').summernote({
                height: 225
            });

            $('#event-date').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true
            });

            $('#starts-at').timepicker({
                minTime: '08:00',
                maxTime: '22:00',
                step: 15,
                timeFormat: 'H:i'
            });

            $('#stops-at').timepicker({
                minTime: '08:00',
                maxTime: '22:00',
                step: 15,
                timeFormat: 'H:i'
            });

            $(document).on('click', '.browse', function(){
                var file = $(this).parent().parent().parent().find('.file');
                file.trigger('click');
            });
            $(document).on('change', '.file', function(){
                $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
            });

        });
    </script>

@stop