@extends('frontend.layout.master')
@section('title')
    Authorities
@endsection
@push('user_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'Authorities', 'sub_page_name' => $type])

    <div id="rs-team" class="rs-team style1 inner-style orange-color pt-94 pb-100 md-pt-64 md-pb-70">
        <div class="container">
            <div class="sec-title mb-50 md-mb-30 text-center">
                <h2 class="title mb-0">Authorities</h2>
            </div>
            <div class="row">
                @foreach ($authorities as $authority)
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="team-item">
                            <img src="{{ asset('uploads/authority') }}/{{ $authority->authority_image }}" alt="">
                            <div class="content-part">
                                <h4 class="name"><a href="#">{{ $authority->authority_name }}</a></h4>
                                <span class="designation">{{ $authority->authority_designation }}</span>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
@push('user_script')
@endpush
