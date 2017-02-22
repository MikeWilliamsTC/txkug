@extends('layouts.app')

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
                        <h3 class="c-font-uppercase c-font-bold">{{ $event->event_type->event_type }}</h3>
                        <div class="c-content-divider c-divider-sm c-theme-bg"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    @include('sections.event-detail')
                </div>

                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body c-center">
                            <a href="/admin/events/{{ $event->slug }}/edit" class="btn btn-success" data-original-title="Edit Event">Edit</a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target=".deleteEventModal-{{ $event->slug }}" data-original-title="Delete Event">Delete</a>
                        </div>
                    </div>

                    @if ( \Carbon\Carbon::now() < $event->starts_at )
                        <div class="alert alert-danger">
                            This event hasn't started yet.
                        </div>
                    @elseif ( \Carbon\Carbon::now() > $event->stops_at )
                        @if ($event->participants->count() )
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{ $event->participants->count() }} {{ str_plural('Attendee', $event->participants->count()) }} </h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="c-content-list-1 c-theme c-separator-dot">
                                        @foreach ($event->participants as $attendee )
                                            <li><a href="/admin/users/{{ $attendee->user->slug }}">{{ $attendee->user->last_name }}, {{ $attendee->user->first_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger c-center">No one attended this event.</div>
                        @endif
                    @else
                        <div class="alert alert-warning">
                            This event is in session.
                        </div>
                    @endif
                </div>
            </div>


            <div class="modal fade deleteEventModal-{{ $event->slug }}" tabindex="-1" role="dialog" aria-labelledby="deleteEventModal-{{ $event->slug }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Delete Event?</h4>
                        </div>
                        {!! Form::model($event, ['route' => ['admin.events.destroy', $event->slug], 'method' => 'DELETE']) !!}
                        <div class="modal-body">
                            <div class="alert alert-danger" role="alert">
                                Deleting an event will also delete all attendee records associated with the event.
                            </div>
                            <p>
                                Are you sure you want to delete this event?
                            </p>
                            <p class="c-padding-20">
                                {{ $event->event_type->event_type }}<br />
                                {{ $event->event_title }} <br />
                                {{ $event->event_date->format('F j, Y') }}
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Yes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        @endslot
    @endcomponent

@stop
