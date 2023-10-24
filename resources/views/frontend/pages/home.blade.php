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
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="true" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true" data-md-device-dots="false">

                        @foreach ($sliders as $slider)
                        <div class="slider-content slide1">
                            <div class="container-fluid">
                                <img class="img-fluid slider-image" src="{{ asset('uploads/slider') }}/{{ $slider->slider_image }}" alt="silder image ">
                                <div class="slider-text">
                                <div class="sl-sub-title white-color wow bounceInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">Global University Bangladesh</div>
                                <h1 class="sl-title white-color wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">{{ $slider->slider_heading }}</h1>
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


                <!-- Testimonial Section Start -->
                <div class="rs-testimonial style2 pt-100 pb-100 md-pt-70 md-pb-70">
                    <div class="container">
                        <div class="row">
                            @foreach ($authorityMessages as $message)
                            <div class="col-lg-4 pr-90 md-pr-15 md-mb-30">
                                <div class="donation-part wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                    <img src="{{ asset('uploads/authority-message') }}/{{ $message->authority_image }}" alt="">
                                    <h3 class="title mb-10">MESSAGE FROM {{ $message->authority_type }}</h3>
                                    <div class="desc mb-38">{!! Str::limit($message->authority_message, 210, '...') !!}</div>
                                    <a href="{{ route('view.authorityMessage',['type'=>$message->authority_type]) }}" class="btn btn-secondary text-center">Read More</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- Testimonial Section End -->



                <!-- About Section Start -->
                <div id="rs-about" class="rs-about style2 pt-94 pb-100 md-pt-64 md-pb-70">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 pr-65 md-pr-15 md-mb-50">
                                <div class="about-intro">
                                    <div class="sec-title mb-40 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                        <div class="sub-title primary">About GUB</div>
                                        <h2 class="title mb-21 white-color">Welcome to <span class="d-lg-block">Global University Bangladesh</span></h2>
                                        <div class="desc big white-color">Lorem ipsum dolor sit amet, consectetur adipisic ing elit, sed eius to mod tempors incididunt ut labore et dolore magna this aliqua  enims ad minim.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 lg-pl-0 ml--25 md-ml-0">
                                <div class="row rs-counter couter-area mb-40">
                                    <div class="col-md-4">
                                        <div class="counter-item one">
                                            <h2 class="number rs-count kplus">2</h2>
                                            <h4 class="title mb-0">Students</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-item two">
                                            <h2 class="number rs-count">3.50</h2>
                                            <h4 class="title mb-0">Average CGPA</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-item three">
                                            <h2 class="number rs-count percent">95</h2>
                                            <h4 class="title mb-0">Graduates</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row grid-area">
                                    <div class="col-md-6 sm-mb-30">
                                        <div class="image-grid">
                                            <img src="{{ asset('assets/frontend') }}/images/about/style2/grid1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image-grid">
                                            <img src="{{ asset('assets/frontend') }}/images/about/style2/grid2.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Section End -->

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
                                        <h4 class="title"><a href="#">Undergraduate</a></h4>
                                        <p class="desc">For admission in B.Sc. a student must have Physics, Chemistry, and Mathematics in SSC/O-Level and HSC/A-level.</p>
                                        <div class="btn-part">
                                            <a href="#">Read More</a>
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
                                        <h4 class="title"><a href="#">Postgraduate</a></h4>
                                        <p class="desc">Anyone who has passed Honors examination from this University or from any other University approved by the UGC Bangladesh</p>
                                        <div class="btn-part">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="degree-wrap">
                                    <img src="{{ asset('assets/frontend') }}/images/degrees/3.jpg" alt="">
                                    <div class="title-part">
                                        <h4 class="title">Master of Laws (LL.M)</h4>
                                    </div>
                                    <div class="content-part">
                                        <h4 class="title"><a href="#">Master of Laws (LL.M)</a></h4>
                                        <p class="desc">Anyone who has passed LL.B. examination from this University or from any other University approved by the UGC Bangladesh</p>
                                        <div class="btn-part">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="degree-wrap">
                                    <img src="{{ asset('assets/frontend') }}/images/degrees/4.jpg" alt="">
                                    <div class="title-part">
                                        <h4 class="title">Business Administration</h4>
                                    </div>
                                    <div class="content-part">
                                        <h4 class="title"><a href="#">Business Administration</a></h4>
                                        <p class="desc">For one year MBA program at least four years BBA degree with a minimum CGPA of 3. For two years MBA program at least a Bachelor</p>
                                        <div class="btn-part">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="degree-wrap">
                                    <img src="{{ asset('assets/frontend') }}/images/degrees/5.jpg" alt="">
                                    <div class="title-part">
                                        <h4 class="title">Executive MBA (EMBA)</h4>
                                    </div>
                                    <div class="content-part">
                                        <h4 class="title"><a href="#">Executive MBA (EMBA)</a></h4>
                                        <p class="desc">For one year MBA program at least four years BBA degree with a minimum CGPA of 3. For two years MBA program at least a Bachelor</p>
                                        <div class="btn-part">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Degree Section End -->

                <!-- CTA Section Start -->
                <div class="rs-cta style2">
                    <div class="partition-bg-wrap inner-page">
                        <div class="container">
                            <div class="row y-bottom">
                                <div class="col-lg-6 pb-50 md-pt-70 md-pb-70">
                                    <div class="video-wrap">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/3GLoGHbhKHg?si=SoMu2d8XP9JbNPDa" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        {{-- <a class="popup-videos" href="https://www.youtube.com/embed/-DkUPoe0HCw?si=9ms-fU3N7lfh2iNd" target="_blank"> --}}
                                                <i class="fa fa-play"></i>
                                                <h4 class="title mb-0">Take a Video  Tour at GUB</h4>
                                            </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 pl-62 pt-134 pb-150 md-pt-50 md-pb-50 md-pl-15">
                                    <div class="sec-title mb-40 md-mb-20">
                                            <h2 class="title mb-16">Admission Open for 2024</h2>
                                            <div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eius to mod tempor incididunt ut labore et dolore magna aliqua. Ut enims ad minim veniam. Aenean massa. Cum sociis natoque penatibus et magnis.</div>
                                    </div>
                                    <div class="btn-part">
                                            <a class="readon orange" href="#">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CTA Section End -->

                <!-- About Section Start -->
                <div class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
                                <div class="img-part">
                                    <img class="" src="{{ asset('assets/frontend') }}/images/about/history.png" alt="About Image">
                                </div>
                                <ul class="nav nav-tabs histort-part" id="myTab" role="tablist">
                                    <li class="nav-item tab-btns single-history">
                                        <a class="nav-link tab-btn active" id="about-history-tab" data-toggle="tab" href="#about-history" role="tab" aria-controls="about-history" aria-selected="true"><span class="icon-part"><i class="flaticon-banknote"></i></span>History</a>
                                    </li>
                                    <li class="nav-item tab-btns single-history">
                                        <a class="nav-link tab-btn" id="about-mission-tab" data-toggle="tab" href="#about-mission" role="tab" aria-controls="about-mission" aria-selected="false"><span class="icon-part"><i class="flaticon-flower"></i></span>Mission & Vission</a>
                                    </li>
                                    <li class="nav-item tab-btns single-history last-item">
                                        <a class="nav-link tab-btn" id="about-admin-tab" data-toggle="tab" href="#about-admin" role="tab" aria-controls="about-admin" aria-selected="false"><span class="icon-part"><i class="flaticon-analysis"></i></span>Administration</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="offset-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="tab-content tabs-content" id="myTabContent">
                                    <div class="tab-pane tab fade show active" id="about-history" role="tabpanel" aria-labelledby="about-history-tab">
                                        <div class="sec-title mb-25">
                                            <h2 class="title">GUB History</h2>
                                            <div class="desc">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                                        </div>
                                        <div class="tab-img">
                                            <img class="" src="{{ asset('assets/frontend') }}/images/about/tab1.jpg" alt="Tab Image">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="about-mission" role="tabpanel" aria-labelledby="about-mission-tab">
                                        <div class="sec-title mb-25">
                                            <h2 class="title">GUB Mission</h2>
                                            <div class="desc">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                                        </div>
                                        <div class="tab-img">
                                            <img class="" src="{{ asset('assets/frontend') }}/images/about/tab2.jpg" alt="Tab Image">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="about-admin" role="tabpanel" aria-labelledby="about-admin-tab">
                                        <div class="sec-title mb-25">
                                            <h2 class="title">GUB Administration</h2>
                                            <div class="desc">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                                        </div>
                                        <div class="tab-img">
                                            <img class="" src="{{ asset('assets/frontend') }}/images/about/tab3.jpg" alt="Tab Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Intro Info Tabs-->
                        <div class="intro-info-tabs">

                        </div>
                    </div>
                </div>
                <!-- About Section End -->

                <!-- Latest Events Section Start -->
                <div class="rs-latest-events style1 bg-wrap pt-100 md-pt-70 md-pb-70">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 pr-65 pt-24 md-pt-0 md-pr-15 md-mb-30">
                                <div class="sec-title mb-42">
                                    <div class="sub-title primary">Latest Events</div>
                                    <h2 class="title mb-0">GUB Events</h2>
                                </div>
                                <div class="single-img wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                    <img src="{{ asset('assets/frontend') }}/images/event/single.jpg" alt="Event Image">
                                </div>
                            </div>
                            <div class="col-lg-6 lg-pl-0">
                                <div class="event-wrap">
                                    <div class="events-short mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                        <div class="date-part bgc1">
                                            <span class="month">June</span>
                                            <div class="date">20</div>
                                        </div>
                                        <div class="content-part">
                                            <div class="categorie">
                                                <a href="#">Math</a> & <a href="#">English</a>
                                            </div>
                                            <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Accessories Learning</a></h4>
                                        </div>
                                    </div>
                                    <div class="events-short mb-30 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                                        <div class="date-part bgc2">
                                            <span class="month">June</span>
                                            <div class="date">21</div>
                                        </div>
                                        <div class="content-part">
                                            <div class="categorie">
                                                <a href="#">Math</a> & <a href="#">English</a>
                                            </div>
                                            <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Accessories Learning</a></h4>
                                        </div>
                                    </div>
                                    <div class="events-short wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms">
                                        <div class="date-part bgc3">
                                            <span class="month">June</span>
                                            <div class="date">22</div>
                                        </div>
                                        <div class="content-part">
                                            <div class="categorie">
                                                <a href="#">Math</a> & <a href="#">English</a>
                                            </div>
                                            <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Accessories Learning</a></h4>
                                        </div>
                                    </div>
                                    <div class="btn-part mt-55 md-mt-25 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="2000ms">
                                        <a href="#">View All Events</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Latest Events Section End -->


            </div>
            <!-- Main content End -->
@endsection
@push('user_script')
@endpush
