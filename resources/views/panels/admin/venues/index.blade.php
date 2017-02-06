@extends('layouts.app')

@section('content')

    <div class="card">
        <h4 class="card-header bg-primary white-text">Venues</h4>
        <div class="card-block">
            <span class="pull-right mb-1">
                <a href="/admin/venues/create" class="btn btn-md bg-primary">Add Venue</a>
            </span>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead blue-grey darken-1 text-white">
                        <tr>
                            <th>Venue Name</th>
                            <th>Address</th>
                            <th style="text-align:center;"># Events</th>
                            <th style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($venues as $venue)
                        <tr>
                            <th scope="row">{{ $venue->venue_name }}</th>
                            <td>{{ $venue->street_address }} {{ $venue->city }} {{ $venue->state }} {{ $venue->zip_code }}</td>
                            <td style="text-align:center;">{{ $venue->events->count() }}</td>
                            <td style="text-align:center;">
                                <a href="/admin/venues/{{ $venue->slug }}/edit" class="green-text"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="red-text" data-toggle="modal" data-target=".deleteVenueModal-{{ $venue->id }}"><i class="fa fa-trash"></i></a>
                                <a href="/admin/venues/{{ $venue->slug }}" class="green-text"><i class="fa fa-arrow-right"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $venues->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    @foreach ($venues as $venue)
        <div class="modal fade deleteVenueModal-{{ $venue->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteVenueModal-{{ $venue->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Venue?</h4>
                    </div>
                    {!! Form::model($venue, ['route' => ['venues.destroy', $venue->id], 'method' => 'DELETE']) !!}
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Deleting a venue will also delete all events, including event participants, associated with that venue.
                        </div>
                        <p>
                            Are you sure you want to delete the venue named <span class="font-weight-bold mt-2">{{ $venue->venue_name }}</span>?
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