@extends('layouts.app')

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Admin Dashboard
        @endslot
    @endcomponent

    @component('layouts.admin-layout')

        @slot('content')

            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Dashboard</h3>
            </div>
            <div class="c-content-divider c-divider-sm c-theme-bg"></div>

            <div class="c-layout-sidebar-content ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                {{--<h4>Total Events: {{ $total_events }}</h4>--}}
                                {{--<h4 class="text-md-center">Average Participants: {{ round($avg_attendance) }}</h4>--}}
                                <canvas id="attendanceChart" height="200"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="venueChart" height="200"></canvas>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endslot
    @endcomponent


    {{--<div class="c-content-box c-size-md c-bg-white">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<h4>Total Events: {{ $total_events }}</h4>--}}
                            {{--<h4 class="text-md-center">Average Participants: {{ round($avg_attendance) }}</h4>--}}
                            {{--<canvas id="attendanceChart" height="175"></canvas>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<canvas id="venueChart" height="175"></canvas>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@stop

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>
        var attendaceChartctx = document.getElementById("attendanceChart");
        var attendanceChart = new Chart(attendaceChartctx, {
            type: 'horizontalBar',
            data: {
                labels: [
                    @foreach($attendance_chart as $ac )
                        "{{ $ac->event_date }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Total Attendees',
                    display: false,
                    data: [
                        @foreach($attendance_chart as $ac )
                            "{{ $ac->attendee_count }}",
                        @endforeach
                    ],
                    backgroundColor: 'rgba(2, 117, 216, 0.4)',
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Attendance '
                },
                scales: {
                    xAxes: [
                        {
                            ticks: {
                                beginAtZero:true,
                                fixedStepSize: 1,
                                max: {{ maxValueInArray($attendance_chart, "attendee_count") + 1 }}
                            }
                        }
                    ]
                }
            }
        });

        {{--var attendaceDetailChartctx = document.getElementById("attendanceDetailChart");--}}
        {{--var attendanceDetailChart = new Chart(attendaceDetailChartctx, {--}}
            {{--type: 'horizontalBar',--}}
            {{--data: {--}}
                {{--labels: [--}}
                    {{--@foreach($attendance_detail_chart as $adc )--}}
                            {{--"{{ $adc->last_name }}, {{ $adc->first_name }}",--}}
                    {{--@endforeach--}}
                {{--],--}}
                {{--datasets: [{--}}
                    {{--label: 'Events Attended',--}}
                    {{--data: [--}}
                        {{--@foreach($attendance_detail_chart as $adc )--}}
                                {{--"{{ $adc->attendee_count }}",--}}
                        {{--@endforeach--}}
                    {{--],--}}
                    {{--backgroundColor: 'rgba(2, 117, 216, 0.4)',--}}
                {{--}]--}}
            {{--},--}}
            {{--options: {--}}
                {{--responsive: true,--}}
                {{--title: {--}}
                    {{--display: true,--}}
                    {{--text: 'Individual Attendance'--}}
                {{--},--}}
                {{--scales: {--}}
                    {{--xAxes: [--}}
                        {{--{--}}
                            {{--ticks: {--}}
                                {{--beginAtZero:true,--}}
                                {{--fixedStepSize: 1,--}}
                                {{--max: {{ maxValueInArray($attendance_detail_chart, "attendee_count") + 1 }}--}}
                            {{--}--}}
                        {{--}--}}
                    {{--]--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}


        var venueChartctx = document.getElementById("venueChart").getContext('2d');
        var venueChart = new Chart(venueChartctx, {
            type: 'doughnut',
            data: {
                labels: [
                    @foreach($venue_chart as $venue )
                        "{!! $venue->venue_name !!}",
                    @endforeach
                ],
                datasets: [{
                    backgroundColor: [
                        "#2ecc71",
                        "#3498db",
                        "#95a5a6",
                        "#9b59b6",
                        "#f1c40f",
                        "#e74c3c",
                        "#34495e"
                    ],
                    data: [
                        @foreach($venue_chart as $venue )
                            "{{ $venue->venue_count }}",
                        @endforeach
                    ],
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Venues'
                }
            }
        });

    </script>

@stop