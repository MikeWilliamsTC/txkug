@extends('layouts.app')

@section('content')

    <h3>Event Venues
        <span class="pull-right waves-effect mb-1"><a href="/admin/venues/create" class="btn btn-md bg-primary">Add Venue</a></span>
    </h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-hover">
            <thead class="thead stylish-color text-white">
            <tr>
                <th>Venue Name</th>
                <th>Address</th>
                <th style="text-align:center;">Events</th>
                <th style="text-align:center;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($venues as $venue)
                <tr>
                    <td><a href="/admin/venues/{{ $venue->slug }}">{{ $venue->venue_name }}</a></td>
                    <td>{{ $venue->street_address }} {{ $venue->city }} {{ $venue->state }} {{ $venue->zip_code }}</td>
                    <td style="text-align:center;">{{ $venue->events->count() }}</td>
                    <td style="text-align:center;">
                        <a href="/admin/venues/{{ $venue->slug }}/edit" class="green-text"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="red-text" data-toggle="modal" data-target=".deleteVenueModal-{{ $venue->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $venues->links('vendor.pagination.bootstrap-4') }}

    @foreach ($venues as $venue)
        <div class="modal fade deleteVenueModal-{{ $venue->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteVenueModal-{{ $venue->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete this venue?</h4>
                    </div>
                    {!! Form::model($venue, ['route' => ['admin.venues.destroy', $venue->id], 'method' => 'DELETE']) !!}
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Deleting a venue will also delete all of its events, including any attendance records associated with the event.
                        </div>
                        <p>
                            Are you sure you want to delete the event venue <span class="font-weight-bold mt-2">{{ $venue->venue_name }}</span>?
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