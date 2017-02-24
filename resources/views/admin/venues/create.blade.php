@extends('layouts.app')

@section('header_scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
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
                        <h3 class="c-font-uppercase c-font-bold">Add Venue</h3>
                    </div>
                    <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    @include('errors.error')

                    {!! Form::open(['route' => ['admin.venues.store'], 'class' => 'form-horizontal']) !!}
                        @include('admin.venues.form')
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
            $('#venue-note').summernote({
                height: 225
            });
        });
    </script>
@endsection