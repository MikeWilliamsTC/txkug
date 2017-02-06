    <div class="row">
        <div class="col-md-6 mb-2">
            <div class="md-form">
            {!! Form::label('venue_name', 'Venue Name') !!}
            {!! Form::text('venue_name') !!}
            </div>
        </div>

        <div class="col-md-3 mb-2">
            <div class="md-form">
                {!! Form::label('lat', 'Latitude') !!}
                {!! Form::text('lat') !!}
            </div>
        </div>

        <div class="col-md-3 mb-2">
            <div class="md-form">
                {!! Form::label('lng', 'Longitude') !!}
                {!! Form::text('lng') !!}
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5 mb-2">
            <div class="md-form">
                {!! Form::label('street_address', 'Street Address') !!}
                {!! Form::text('street_address') !!}
            </div>
        </div>

        <div class="col-md-3 mb-2">
            <div class="md-form">
                {!! Form::label('city', 'City') !!}
                {!! Form::text('city') !!}
            </div>
        </div>

        <div class="col-md-2 mb-2">
            <div class="md-form">
                {!! Form::label('state', 'State Abbr.') !!}
                {!! Form::text('state') !!}
            </div>
        </div>

        <div class="col-md-2 mb-2">
            <div class="md-form">
                {!! Form::label('zip_code', 'Zip Code') !!}
                {!! Form::text('zip_code') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form">
                {!! Form::label('venue_note', 'Venue Note') !!}<br />
                {!! Form::textarea('venue_note', null, ['class' => 'md-textarea']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="/admin/venues" class="btn bg-danger waves-effect">Cancel</a>
            <button type="submit" class="btn bg-primary waves-effect pull-right">Submit</button>
        </div>
    </div>