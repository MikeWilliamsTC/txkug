@extends('layouts.app')

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            My Account
        @endslot
    @endcomponent

    @component('sections.user-layout')

        @slot('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold">My Profile</h3>
                    </div>
                    <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $user->social->avatar_192 }}" class="img-responsive img-thumbnail">
                </div>

                <div class="col-md-9">
                    <p>
                        {{ $user->first_name }} {{ $user->last_name }}<br />
                        @if ( $user->social->title  ) {{ $user->social->title }} <br /> @endif
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a><br />
                        Role: @if ( $user->roles[0]->id == 2 ) Admin @else User @endif <br />
                        Joined: {{ $user->created_at->format('l d, Y') }}
                    </p>
                </div>
            </div>

        @endslot
    @endcomponent
@stop