<div class="row">
    <div class="col-md-4 mb-2">
        <div class="md-form">
            {!! Form::label('event_name', 'Event Type (e.g.: Monthly Meeting)') !!}
            {!! Form::text('event_name') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-2">
        <div class="md-form">
            {!! Form::select('venue_id', $venues, null, ['placeholder' => 'Select a Venue']) !!}
            {!! Form::label('venue_id', 'Venue') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-2">
        <div class="md-form">
            {!! Form::label('event_date', 'Event Date') !!}
            {!! Form::text('event_date', null, ['class' => 'event_date']) !!}
        </div>
    </div>

    <div class="col-md-3 mb-2">
        <div class="md-form">
            {!! Form::label('starts_at', 'Start Time') !!}
            {!! Form::text('starts_at', null, ['class' => 'starts_at']) !!}
        </div>
    </div>

    <div class="col-md-3 mb-2">
        <div class="md-form">
            {!! Form::label('stops_at', 'Stop Time') !!}
            {!! Form::text('stops_at', null, ['class' => 'stops_at']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-2">
        <div class="md-form">
            {!! Form::label('event_title', 'Event Title') !!}
            {!! Form::text('event_title') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-2">
        <div class="md-form">
            {!! Form::label('event_description', 'Event Description') !!}
            {!! Form::textarea('event_description', null, ['class' => 'md-textarea']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <a href="/admin/events" class="btn bg-danger waves-effect">Cancel</a>
            <button type="submit" class="btn bg-primary waves-effect pull-right">Submit</button>
        </div>
    </div>
</div>