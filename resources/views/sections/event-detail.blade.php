<div class="c-content-blog-post-card-1 c-option-2 c-bordered">
    <div class="c-media">
        <img class="img-responsive" src="/storage/events/{{ $event->event_image }}" alt="{{ $event->event_title }}">
    </div>
    <div class="c-body">
        <div class="c-title c-font-bold c-font-uppercase">
            {{ $event->event_title }}
        </div>
        <div class="c-author">
            <i class="fa fa-calendar" style="padding-right: 10px;"></i><span class="c-font-uppercase">{{ $event->event_date->format('l F d, Y') }} from {{ $event->starts_at->format('h:i A') }} - {{ $event->stops_at->format('h:i A') }}</span>
            <br />
            <i class="fa fa-map-marker" style="padding-right: 15px;"></i><span class="c-font-uppercase">{{ $event->venue->venue_name }}</span>
        </div>
        <div class="c-panel"></div>

        {!! $event->event_description !!}

    </div>
</div>