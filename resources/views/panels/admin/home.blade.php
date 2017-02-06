@extends('layouts.app')

@section('content')

    <div class="card">
        <h4 class="card-header bg-primary white-text">Dashboard</h4>
        <div class="card-block">
            <div class="row mt-2">
                <div class="col-md-6">
                    <h4 class="mt-4  text-md-center">Total Events</h4>
                    <h1 class="text-md-center font-weight-bold">{{ $total_events }}</h1>
                        <hr class="mt-2 mb-2"/>
                    <h4 class="text-md-center">Average Participants</h4>
                    <h1 class="text-md-center font-weight-bold">{{ round($avg_attendance) }}</h1>
                </div>
                <div class="col-md-6 mb-2">
                    <canvas id="attendanceChart" height="250" class="p-1"></canvas>
                </div>
            </div>

            <hr />
            
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <canvas id="attendanceDetailChart" height="250" class="p-1"></canvas>
                </div>
                <div class="col-md-6 mb-2">
                    <canvas id="venueChart" height="250" class="p-1"></canvas>
                </div>
            </div>
        </div>
    </div>

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
                            "{{ $ac->participant_count }}",
                        @endforeach
                    ],
                    backgroundColor: 'rgba(2, 117, 216, 0.4)',
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Event Attendance '
                },
                scales: {
                    xAxes: [
                        {
                            ticks: {
                                beginAtZero:true,
                                fixedStepSize: 1,
                                max: {{ maxValueInArray($attendance_chart, "participant_count") + 1 }}
                            }
                        }
                    ]
                }
            }
        });

        var attendaceDetailChartctx = document.getElementById("attendanceDetailChart");
        var attendanceDetailChart = new Chart(attendaceDetailChartctx, {
            type: 'horizontalBar',
            data: {
                labels: [
                    @foreach($attendance_detail_chart as $adc )
                            "{{ $adc->last_name }}, {{ $adc->first_name }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Events Attended',
                    data: [
                        @foreach($attendance_detail_chart as $adc )
                                "{{ $adc->attendee_count }}",
                        @endforeach
                    ],
                    backgroundColor: 'rgba(2, 117, 216, 0.4)',
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Individual Attendance'
                },
                scales: {
                    xAxes: [
                        {
                            ticks: {
                                beginAtZero:true,
                                fixedStepSize: 1,
                                max: {{ maxValueInArray($attendance_detail_chart, "attendee_count") + 1 }}
                            }
                        }
                    ]
                }
            }
        });


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
                    text: 'Venues Used'
                }
            }
        });

    </script>

@stop