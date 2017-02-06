@extends('layouts.app')

@section('content')
    @if ( is_null($event) )

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card testimonial-card">
                    <div class="card-up card-primary"></div>
                    <div class="avatar"><img src="/img/txkug-logo.jpg" class="rounded-circle img-responsive"></div>
                    <div class="card-block text-xs-center">
                        <h4 class="card-title"><strong>Texarkana Area IT Users Group</strong></h4>
                        <hr />
                        <p class="card-text">There are no meetings or events currently scheduled.</p>
                        <hr />
                        <a type="button" class="btn-floating btn-small btn-email wow fadeInLeft" target="_blank" href="https://www.txkug.com/"><i class="fa fa-link"></i></a>
                        <a type="button" class="btn-floating btn-small btn-dribbble wow fadeInLeft" target="_blank" href="https://txkug.slack.com"><i class="fa fa-slack"></i></a>
                        <a type="button" class="btn-floating btn-small btn-fb wow fadeInRight" target="_blank" href="https://www.facebook.com/txkug/?fref=ts"><i class="fa fa-facebook"></i></a>
                        <a type="button" class="btn-floating btn-small btn-tw wow fadeInRight" target="_blank" href="https://twitter.com/Txkug"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>



    @else
        @include('partials.event-card')
    @endif
@stop

@section('footer')

    @if (is_null($event) )

        <script>
            new WOW().init();
        </script>

    @else
        <script>

            function initMap() {

                var eventMap = new google.maps.Map(document.getElementById('event-map'), {
                    zoom: 14,
                    center: {lat: {{ $event->venue->lat }}, lng: {{ $event->venue->lng }} },
                    mapTypeId: 'roadmap'
                });

                var eventMarker = new google.maps.Marker({
                    position: {lat: {!! $event->venue->lat !!}, lng: {!! $event->venue->lng !!} },
                    map: eventMap,
                });

               var eventCircle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.15,
                    map: eventMap,
                    center: {lat: {!! $event->venue->lat !!}, lng: {!! $event->venue->lng !!}},
                    radius: 250
               });

               google.maps.event.addListener(eventMarker, "click", function (e) {
                    var infoWindow = new google.maps.InfoWindow();
                    infoWindow.setContent(eventMarker.title);
                    infoWindow.open(eventMap, eventMarker);
               });

                circleBounds = eventCircle.getBounds();

                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(function (position) {

                        var myLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                        var startCheckIn = '{{ $event->starts_at->subMinutes(30)->format('H:i:s') }}';
                        var stopCheckIn = '{{ $event->stops_at->format('H:i:s') }}';
//                        var now = moment().format('HH:mm:ss');

                        var now = function currentTime() {
                            return moment().format('HH:mm:ss');
                            setTimeout(currentTime, 15000);
                        };
//
//                        console.log(now());

                        if ( moment().format('YYYY-MM-DD') == '{{ $event->event_date->format('Y-m-d') }}' ) {
                            if ( now() < startCheckIn ) {
                                document.getElementById("check-in-msg").innerHTML = "<span class='grey-text'>Check-in will be available at {{ $event->starts_at->subMinutes(30)->format('h:i A') }}.</span>";
                            }
                            else if ( now() > startCheckIn && now() < stopCheckIn) {
                                if (circleBounds.contains(myLocation)) {
                                    @if( $event->participants->contains('user_id', Auth::id()))
                                        document.getElementById("check-in-msg").innerHTML = "<strong class='green-text'>You Are Checked In!</strong>";
                                    @else
//                                        document.getElementById("check-in-msg").innerHTML = "<strong class='green-text'>You can check in now!</strong>";
                                        document.getElementById("check-in-msg").innerHTML = "<strong class='green-text'>You can check in to the event now!</strong><br /><button type='button' class='btn btn-light-green' onclick='checkIn();'>Check In</button>";
                                    @endif
                                }
                                else{
                                    @if( $event->participants->contains('user_id', Auth::id()))
                                        document.getElementById("check-in-msg").innerHTML = "<strong class='green-text'>You are checked in but you must have left the meeting!</strong>";
                                    @else
                                        document.getElementById("check-in-msg").innerHTML = "<strong class='orange-text'>The meeting has started but you have not arrived yet!</strong>";
                                    @endif
                                }
                            }
                            else if (now() > stopCheckIn) {
                                document.getElementById("check-in-msg").innerHTML = "<strong class='red-text'>The meeting has ended.</strong>";
                            }
                            else {
                                document.getElementById("check-in-msg").innerHTML = "<span class='red-text'>Check in will be available 30 minutes prior to start time.</span>";
                            }
                        }
                        else {
                            document.getElementById("check-in-msg").innerHTML = "<span class='grey-text'>Check-in will be available at <br />{{ $event->starts_at->subMinutes(30)->format('H:i A') }} on {{ $event->event_date->format('l F j, Y') }}.</span>";
                        }
                    });
                }
                else {
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            }
        </script>

        <script>
            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
            }
        </script>

        <script>

            function checkIn () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/api/event',
                    data: {'event_id':{{ $event->id }}, 'user_id': {{ Auth::id() }} },
                    success: function(data){

                        $("#check-in-btn").hide();
                        document.getElementById("check-in-msg").innerHTML = "<strong class='green-text'>You Are Checked In!</strong>";

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            }

        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_8gi6VR7JrziC3Rq1ArFF92JR_4pSbt4&callback=initMap"></script>

    @endif
@stop