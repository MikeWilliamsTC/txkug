@extends('layouts.app')

@section('content')

    <h3>Add Event Venue</h3>

    <hr class="mt-1 mb-2">

    @include('errors.error')

    {!! Form::open(['route' => ['admin.venues.store'], 'class' => 'form-horizontal']) !!}
        @include('panels.admin.venues.form')
    {!! Form::close() !!}

@stop