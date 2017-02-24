<div class="form-group">
    {!! Form::label('venue_name', 'Venue Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('venue_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('street_address', 'Street Address', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('street_address', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('city', 'City', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('state', 'State', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::select('state', $states, null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
        {{--{!! Form::text('state', null, ['class' => 'form-control']) !!}--}}
    </div>

    {!! Form::label('zip_code', 'Zip Code', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('lat', 'Latitude', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('lat', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('lng', 'Longitude', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('lng', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('venue_note', 'Note', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('venue_note', null, ['id' => 'venue-note', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        @if ( isset($venue->slug) )
            <a href="{{ route('admin.venues.show', ['slug' => $venue->slug]) }}" class="btn btn-danger">Cancel</a>
        @else
            <a href="{{ route('admin.venues.index') }}" class="btn btn-danger">Cancel</a>
        @endif
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
    </div>
</div>