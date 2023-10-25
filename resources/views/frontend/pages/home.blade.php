@extends('frontend.layout.master')
@section('title')
    Home Page
@endsection
@push('user_style')
@endpush
@section('content')
    <!-- Main content Start -->
    <div class="main-content">

        <!-- Slider Section Start -->
        <div class="rs-slider style1">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false"
                data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false"
                data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false"
                data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="true"
                data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true" data-md-device-dots="false">

                @foreach ($sliders as $slider)
                    <div class="slider-content slide1">
                        <div class="container-fluid">
                            <img class="img-fluid slider-image"
                                src="{{ asset('uploads/slider') }}/{{ $slider->slider_image }}" alt="silder image ">
                            <div class="slider-text">
                                <div class="sl-sub-title white-color wow bounceInLeft" data-wow-delay="300ms"
                                    data-wow-duration="2000ms">Global University Bangladesh</div>
                                <h1 class="sl-title white-color wow fadeInRight" data-wow-delay="600ms"
                                    data-wow-duration="2000ms">{{ $slider->slider_heading }}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- Slider Section End -->

        <!-- Services Section Start -->
        <div class="rs-services style1">
            <div class="row no-gutter">
                <div class="col-lg-3 col-md-6">
                    <div class="service-item overly1">
                        <img src="{{ asset('assets/frontend') }}/images/services/1.jpg" alt="">
                        <div class="content-part">
                            <img src="{{ asset('assets/frontend') }}/images/services/icons/1.png" alt="">
                            <h4 class="title">University Life</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-item overly2">
                        <img src="{{ asset('assets/frontend') }}/images/services/1.jpg" alt="">
                        <div class="content-part">
                            <img src="{{ asset('assets/frontend') }}/images/services/icons/2.png" alt="">
                            <h4 class="title">Graduation</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-item overly3">
                        <img src="{{ asset('assets/frontend') }}/images/services/1.jpg" alt="">
                        <div class="content-part">
                            <img src="{{ asset('assets/frontend') }}/images/services/icons/3.png" alt="">
                            <h4 class="title">Athletics</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-item overly4">
                        <img src="{{ asset('assets/frontend') }}/images/services/1.jpg" alt="">
                        <div class="content-part">
                            <img src="{{ asset('assets/frontend') }}/images/services/icons/1.png" alt="">
                            <h4 class="title">Social</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Section End -->


        <!-- Latest Events Section Start -->
        <div class="rs-latest-events style1 bg-wrap pt-100 md-pt-70 md-pb-70 my-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 lg-pl-0">
                        <div class="event-wrap">
                            <div class="text-center wow fadeInUp">
                                <h2 data-wow-delay="600ms" data-wow-duration="2000ms">Latest Notice</h2>
                            </div>

                            @foreach ($notices as $index => $notice)
                                @php
                                    $bgClasses = ['bgc1', 'bgc2', 'bgc3'];
                                    $classIndex = $index % count($bgClasses);
                                    $bgClass = $bgClasses[$classIndex];
                                @endphp
                                <div class="events-short mb-30 wow fadeInUp" data-wow-delay="300ms"
                                    data-wow-duration="2000ms">
                                    <div class="date-part {{ $bgClass }}">
                                        <span class="month">{{ $notice->created_at->format('F') }}</span>
                                        <div class="date">{{ $notice->created_at->format('d') }}</div>
                                    </div>
                                    <div class="content-part">
                                        <div class="categorie">
                                            <a href="{{ route('index.notice') }}">Notice</a>
                                        </div>
                                        <h4 class="title mb-0"><a
                                                href="{{ route('index.notice') }}">{{ $notice->notice_title }}</a></h4>
                                    </div>
                                </div>
                            @endforeach

                            <div class="btn-part mt-55 md-mt-25 wow fadeInUp" data-wow-delay="600ms"
                                data-wow-duration="2000ms">
                                <a href="{{ route('index.notice') }}">View All Notices</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Events Section End -->



        <!-- Testimonial Section Start -->
        <div class="rs-testimonial style2 pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="text-center pb-5">
                    <h2>Message From Authority</h2>
                </div>
                <div class="row">
                    @foreach ($authorityMessages as $message)
                        <div class="col-lg-4 pr-90 md-pr-15 md-mb-30">
                            <div class="donation-part wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                <img src="{{ asset('uploads/authority-message') }}/{{ $message->authority_image }}"
                                    alt="">
                                <h3 class="title mb-10">MESSAGE FROM {{ $message->authority_type }}</h3>
                                <div class="desc mb-38">{!! Str::limit($message->authority_message, 210, '...') !!}</div>
                                <a href="{{ route('view.authorityMessage', ['type' => $message->authority_type]) }}"
                                    class="btn btn-secondary text-center">Read More</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Testimonial Section End -->


        <!-- Degree Section Start -->
        <div class="rs-degree style1 modify gray-bg pt-100 pb-70 md-pt-70 md-pb-40">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="sec-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                            <div class="sub-title primary">Degree categoris</div>
                            <h2 class="title mb-0">Successfully Complete A Degree at Global University Bangladesh</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="degree-wrap">
                            <img src="{{ asset('assets/frontend') }}/images/degrees/1.jpg" alt="">
                            <div class="title-part">
                                <h4 class="title">Undergraduate</h4>
                            </div>
                            <div class="content-part">
                                <h4 class="title"><a
                                        href="{{ route('index.admission', ['type' => 'Undergraduate Admission']) }}">Undergraduate</a>
                                </h4>
                                <div class="btn-part">
                                    <a href="{{ route('index.admission', ['type' => 'Undergraduate Admission']) }}">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="degree-wrap">
                            <img src="{{ asset('assets/frontend') }}/images/degrees/2.jpg" alt="">
                            <div class="title-part">
                                <h4 class="title">Postgraduate</h4>
                            </div>
                            <div class="content-part">
                                <h4 class="title"><a
                                        href="{{ route('index.admission', ['type' => 'Postgraduate Admission']) }}">Postgraduate</a>
                                </h4>
                                <div class="btn-part">
                                    <a href="{{ route('index.admission', ['type' => 'Postgraduate Admission']) }}">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Degree Section End -->



        <!-- About Section Start -->
        <div id="rs-about" class="rs-about style2 pt-94 pb-100 md-pt-64 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="text-center">
                            <h2>ACHIEVEMENT</h2>
                        </div>
                        <div class="row rs-counter couter-area mb-40">
                            <div class="col-md-3">
                                <div class="counter-item one">
                                    <h2 class="number rs-count ">2</h2>
                                    <h4 class="title mb-0">WINNER AWARD</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="counter-item two">
                                    <h2 class="number rs-count">4</h2>
                                    <h4 class="title mb-0">OUR LAB</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="counter-item three">
                                    <h2 class="number rs-count ">2000</h2>
                                    <h4 class="title mb-0">HAPPY STUDENTS</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="counter-item one">
                                    <h2 class="number rs-count ">7</h2>
                                    <h4 class="title mb-0">VARIOUS COURSE</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End -->



        <div class="rs-cta style2 mt-2">
            <div class="partition-bg-wrap inner-page">
                <div class="container-fluid">
                    <div class="row y-bottom">
                        <div class="col-12 pb-50 md-pt-70 md-pb-70">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ENnJPAwzjXQ"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Main content End -->
@endsection
@push('user_script')
@endpush
