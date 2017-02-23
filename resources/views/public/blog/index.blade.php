@extends('layouts.app')


@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Blog
        @endslot
    @endcomponent




@stop
