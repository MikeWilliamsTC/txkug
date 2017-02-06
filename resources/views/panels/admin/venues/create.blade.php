@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-block">

            <div class="text-center">
                <h3><i class="fa fa-map-marker"></i> Add a Venue</h3>
                <hr class="mt-2 mb-2">
            </div>

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

            {!! Form::open(['route' => ['venues.store'], 'class' => 'form-horizontal']) !!}
                @include('panels.admin.venues.form')
            {!! Form::close() !!}

        </div>
    </div>

@stop