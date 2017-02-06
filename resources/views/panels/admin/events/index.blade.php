@extends('layouts.app')

@section('head')

@stop

@section('content')

    <div class="card">
        <h4 class="card-header bg-primary white-text">Events</h4>
        <div class="card-block">
            <span class="pull-right mb-1">
                <a href="/admin/events/create" class="btn btn-md bg-primary">Add Event</a>
            </span>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead blue-grey darken-1 text-white">
                        <tr>
                            <th>Date</th>
                            <th>Event Type</th>
                            <th>Venue</th>
                            <th>Attendance</th>
                            <th style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->event_date->format('F j, Y') }}</td>
                            <td>{{ $event->event_name }}</td>
                            <td>{{ $event->venue->venue_name }}</td>
                            <td style="text-align:center;">{{ $event->participants->count() }}</td>
                            <td style="text-align:center;">
                                <a href="/admin/events/{{ $event->slug }}/edit" class="green-text"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="red-text" data-toggle="modal" data-target=".deleteEventModal-{{ $event->id }}"><i class="fa fa-trash"></i></a>
                                <a href="/admin/events/{{ $event->slug }}" class="green-text"><i class="fa fa-arrow-right"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $events->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    @foreach ($events as $event)
        <div class="modal fade deleteEventModal-{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteEventModal-{{ $event->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Event?</h4>
                    </div>
                    {!! Form::model($event, ['route' => ['events.destroy', $event->id], 'method' => 'DELETE']) !!}
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Deleting an event will also delete all participants associated with that event.
                        </div>
                        <p>
                            Are you sure you want to delete this event <span class="font-weight-bold">{{ $event->event_name }}</span>?
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
    @endforeach
@stop