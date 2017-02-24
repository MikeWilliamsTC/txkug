
@if ( isset($event->event_image) )
    <div class="form-group">
        {!! Form::label('event_image', 'Image Preview', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            <img class="img-thumbnail" src="/storage/events/{{ $event->event_image }}" alt="{{ $event->event_title }}">
        </div>
    </div>
@endif

<div class="form-group">
    {!! Form::label('event_image', 'Event Image', ['class' => 'col-sm-2 control-label']) !!}
    <div class="input-group col-sm-6">
        <span class="input-group-btn margin">
            <button class="browse btn btn-primary" style="margin-left: 15px;" type="button"> Browse</button>
        </span>
        <input type="text" class="form-control" style="background: transparent;" disabled placeholder="Upload Image">
    </div>
    <input type="file" name="event_image_file" class="file col-sm-2 control-label" style="visibility: hidden; position: absolute;">
</div>

<div class="form-group">
    {!! Form::label('event_title', 'Event Title', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('event_title', null, ['class' => 'form-control', 'placeholder' => 'Event Title']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('event_type_id', 'Event Type', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('event_type_id', $event_types, null, ['class' => 'form-control', 'placeholder' => 'Select an Event Type']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('venue_id', 'Event Venue', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('venue_id', $venues, null, ['class' => 'form-control', 'placeholder' => 'Select a Venue']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('event_date', 'Event Date', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('event_date', null, ['id' => 'event-date', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('starts_at', 'Start Time', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('starts_at', null, ['id' => 'starts-at' ,'class' => 'form-control time']) !!}
    </div>
    {!! Form::label('stops_at', 'Stop Time', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('stops_at', null, ['id' => 'stops-at', 'class' => 'form-control time']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('event_description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('event_description', null, ['id' => 'event-description', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        @if ( isset($event->slug) )
            <a href="{{ route('admin.events.show', ['slug' => $event->slug]) }}" class="btn btn-danger">Cancel</a>
        @else
            <a href="{{ route('admin.events.index') }}" class="btn btn-danger">Cancel</a>
        @endif
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
    </div>
</div>