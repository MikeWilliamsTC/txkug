@extends('layouts.app')

@section('content')

    <h3 class="mb-4">Edit Venue {{ $venue->venue_name }}</h3>

    @include('errors.error')

    {!! Form::model($venue, ['route' => ['venues.update', $venue->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @include('panels.admin.venues.form')
    {!! Form::close() !!}

@stop