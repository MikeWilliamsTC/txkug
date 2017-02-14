@extends('layouts.app')

@section('content')

    <h3>Events
        <span class="pull-right waves-effect mb-1"><a href="/admin/events/create" class="btn btn-md bg-primary">Add Event</a></span>
    </h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-hover">
            <thead class="thead stylish-color text-white">
                <tr>
                    <th>Date</th>
                    <th>Event Type</th>
                    <th>Venue</th>
                    <th>Participants</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td><a href="/admin/events/{{ $event->slug }}">{{ $event->event_date->format('F j, Y') }}</a></td>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->venue->venue_name }}</td>
                    <td style="text-align:center;">{{ $event->participants->count() }}</td>
                    <td style="text-align:center;">
                        <a href="/admin/events/{{ $event->slug }}/edit" class="green-text"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="red-text" data-toggle="modal" data-target=".deleteEventModal-{{ $event->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $events->links('vendor.pagination.bootstrap-4') }}

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
                    {!! Form::model($event, ['route' => ['admin.events.destroy', $event->id], 'method' => 'DELETE']) !!}
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Deleting an event will also delete all participants associated with that event.
                        </div>
                        <p>
                            Are you sure you want to delete event <span class="font-weight-bold">{{ $event->event_name }}</span> scheduled on <span class="font-weight-bold">{{ $event->event_date->format('F j, Y') }} </span>?
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