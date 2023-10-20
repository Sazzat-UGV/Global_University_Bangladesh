@extends('frontend.layout.master')
@section('title')
    Contact
@endsection
@push('user_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'Contact Us', 'sub_page_name' => ''])
    <!-- Contact Section Start -->
    <div class="contact-page-section pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row rs-contact-box mb-90 md-mb-50">
                <div class="col-lg-4 col-md-12-4 lg-pl-0 sm-mb-30 md-mb-30">
                    <div class="address-item">
                        <div class="icon-part">
                            <img src="{{ asset('assets/frontend') }}/images/contact/icon/1.png" alt="">
                        </div>
                        <div class="address-text">
                            <span class="label">Address</span>
                            <span class="des">BN Tower, Natullahbad, Barishal</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30 md-mb-30">
                    <div class="address-item">
                        <div class="icon-part">
                            <img src="{{ asset('assets/frontend') }}/images/contact/icon/2.png" alt="">
                        </div>
                        <div class="address-text">
                            <span class="label">Email Address</span>
                            <span class="des"><a
                                    href="mailto:info@globaluniversity.edu.bd">info@globaluniversity.edu.bd</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30">
                    <div class="address-item">
                        <div class="icon-part">
                            <img src="{{ asset('assets/frontend') }}/images/contact/icon/3.png" alt="">
                        </div>
                        <div class="address-text">
                            <span class="label">Phone Number</span>
                            <span class="des"><a href="tel:+8801700-569030">+8801700-569030</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 md-mb-30">
                    <!-- Map Section Start -->
                    <div class="contact-map3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1679.4185756460308!2d90.34836507952276!3d22.71307198349026!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755358576061b73%3A0xbfa6d427e59e9c28!2zR2xvYmFsIFVuaXZlcnNpdHkgQmFuZ2xhZGVzaCDgppfgp43gprLgp4vgpqzgpr7gprIg4Kas4Ka_4Ka24KeN4Kas4Kas4Ka_4Kam4KeN4Kav4Ka-4Kay4Kav4Ka8IOCmrOCmvuCmguCmsuCmvuCmpuCnh-Cmtg!5e1!3m2!1sen!2sbd!4v1697715478460!5m2!1sen!2sbd"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 pl-60 md-pl-15">
                    <div class="contact-comment-box">
                        <div class="inner-part">
                            <h2 class="title mb-mb-15">Get In Touch</h2>
                            <p>Have some suggestions or just want to say hi? Our support team are ready to help you 24/7.
                            </p>
                        </div>
                        <form method="POST" action="{{ route('contact_post') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input
                                        class="from-control @error('name')
                                        is-invalid
                                        @enderror"
                                        type="text" value="{{ old('name') }}" id="name" name="name"
                                        placeholder="Name" required="">
                                    @error('name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input
                                        class="from-control @error('email')
                                        is-invalid
                                        @enderror"
                                        type="text" value="{{ old('email') }}" id="email" name="email"
                                        placeholder="Email" required="">
                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input
                                        class="from-control @error('phone')
                                        is-invalid
                                        @enderror"
                                        type="text" value="{{ old('phone') }}" id="phone" name="phone"
                                        placeholder="Phone" required="">
                                    @error('phone')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                    <input
                                        class="from-control @error('subject')
                                        is-invalid
                                        @enderror"
                                        type="text" value="{{ old('subject') }}" id="subject" name="subject"
                                        placeholder="Subject" required="">
                                    @error('subject')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-50">
                                    <textarea
                                        class="from-control @error('message')
                                        is-invalid
                                        @enderror"
                                        id="message" name="message" placeholder=" Message" required="">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group mb-0">
                                <input class="btn-send" type="submit" value="Submit Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
@endsection
@push('user_script')
@endpush
