@extends('layouts.app')

@section('content')

    <section class="section feature-box" id="app-todo">
        <h1 class="section-heading wow fadeIn" data-wow-delay="0.2s">Stuff we need to do</h1>

        <div class="row features-small">
            <div class="col-md-3 offset-3">
                <h2>Public</h2>
                <ul>
                    <li>Upcoming events</li>
                    <li>News</li>
                    <li>Twitter Feed</li>
                    <li>Facebook Feed</li>
                    <li>Meeting Checkin</li>
                </ul>
            </div>

            <div class="col-md-3">
                <h2>User</h2>
                <ul>
                    <li>Upcoming events Slack Notification Event</li>
                    <li>Meeting Checkin </li>
                </ul>
            </div>
        </div>
    </section>

    <hr class="between-sections">

    <section class="section feature-box" id="best-features">
        <h1 class="section-heading wow fadeIn" data-wow-delay="0.2s">Why are we so great?<br/>Who knows???</h1>
        <p class="section-description lead wow fadeIn" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam. Quia, minima?</p>
        <div class="row features-small">
            <div class="col-md-4 wow fadeInRight" data-wow-delay="0.2s">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-flag-checkered indigo-text"></i>
                    </div>
                    <div class="col-10">
                        <h4 class="feature-title">International</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                        <div style="height:30px"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-flask blue-text"></i>
                    </div>
                    <div class="col-10">
                        <h4 class="feature-title">Experimental</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                        <div style="height:30px"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-glass cyan-text"></i>
                    </div>
                    <div class="col-10">
                        <h4 class="feature-title">Relaxing</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                        <div style="height:30px"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 m-b-r center-on-small-only wow fadeInRight" data-wow-delay="0.3s">
                <img src="https://mdbootstrap.com/images/mockups/header-iphone.png" alt="" class="z-depth-0">
            </div>

            <div class="col-md-4 wow fadeInRight" data-wow-delay="0.4s">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-heart red-text"></i>
                    </div>
                    <div class="col-10">
                        <h4 class="feature-title">Beloved</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                        <div style="height:30px"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-flash orange-text"></i>
                    </div>
                    <div class="col-10">
                        <h4 class="feature-title">Rapid</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                        <div style="height:30px"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-magic lime-text"></i>
                    </div>
                    <div class="col-10">
                        <h4 class="feature-title">Magical</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                        <div style="height:30px"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop
