@extends('layouts.app')

@section('content')

    <h3>Edit Event Venue</h3>

    <hr class="mt-1 mb-2">

    @include('errors.error')

    {!! Form::model($venue, ['route' => ['admin.venues.update', $venue->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @include('panels.admin.venues.form')
    {!! Form::close() !!}

@stop