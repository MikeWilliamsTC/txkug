@extends('layouts.app')

@section('content')

    @include('sections.intro-slider')
    @include('sections.about-us')

@stop

@section('footer_scripts')
    <script src="{{ asset('assets/base/js/scripts/revo-slider/slider-4.js') }}" type="text/javascript"></script>
@stop



