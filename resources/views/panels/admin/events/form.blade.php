<div class="row">
    <div class="col-md-6 mt-2 mb-2">
        {!! Form::select('venue_id', $venues, null, ['placeholder' => 'Select a Venue', 'class' => 'venue-select']) !!}
        {!! Form::label('venue_id', 'Venue') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-2">
        {!! Form::label('event_name', 'Event Type (e.g.: Monthly Meeting)') !!}
        {!! Form::text('event_name') !!}
    </div>

    <div class="col-md-2 mb-2">
        {!! Form::label('event_date', 'Event Date') !!}
        {!! Form::text('event_date', null, ['class' => 'event_date']) !!}
    </div>

    <div class="col-md-2 mb-2">
        {!! Form::label('starts_at', 'Start Time') !!}
        {!! Form::text('starts_at', null, ['class' => 'starts_at']) !!}
    </div>

    <div class="col-md-2 mb-2">
        {!! Form::label('stops_at', 'Stop Time') !!}
        {!! Form::text('stops_at', null, ['class' => 'stops_at']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-2">
        {!! Form::label('event_title', 'Event Title') !!}
        {!! Form::text('event_title') !!}
    </div>

</div>

<div class="row">
    <div class="col-md-12 mb-2">
        {!! Form::label('event_description', 'Event Description') !!}
        {!! Form::textarea('event_description', null, ['class' => 'md-textarea']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-2">
        <button type="submit" class="btn bg-primary">Submit</button>
        <a href="/admin/events" class="btn bg-danger">Cancel</a>
    </div>
</div>