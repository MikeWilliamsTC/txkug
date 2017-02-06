    <div class="row">
        <div class="col-md-6 mb-2">
            {!! Form::label('venue_name', 'Venue Name') !!}
            {!! Form::text('venue_name') !!}
        </div>

        <div class="col-md-3 mb-2">
            {!! Form::label('lat', 'Latitude') !!}
            {!! Form::text('lat') !!}
        </div>

        <div class="col-md-3 mb-2">
            {!! Form::label('lng', 'Longitude') !!}
            {!! Form::text('lng') !!}
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 mb-2">
            {!! Form::label('street_address', 'Street Address') !!}
            {!! Form::text('street_address') !!}
        </div>

        <div class="col-md-3 mb-2">
            {!! Form::label('city', 'City') !!}
            {!! Form::text('city') !!}
        </div>

        <div class="col-md-1 mb-2">
            {!! Form::label('state', 'State') !!}
            {!! Form::text('state') !!}
        </div>

        <div class="col-md-2 mb-2">
            {!! Form::label('zip_code', 'Zip Code') !!}
            {!! Form::text('zip_code') !!}
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 mb-2">
            {!! Form::label('venue_note', 'Venue Note') !!}<br />
            {!! Form::textarea('venue_note', null, ['class' => 'md-textarea']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn bg-primary">Submit</button>
            <a href="/admin/venues" class="btn bg-danger">Cancel</a>
        </div>
    </div>