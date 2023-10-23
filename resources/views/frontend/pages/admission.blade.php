@extends('frontend.layout.master')
@section('title')
    Admission
@endsection
@push('user_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'Admission', 'sub_page_name' => $type])
    @foreach ($admissions as $admission)
        <!-- About Section Start -->
        <div id="rs-about" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-last padding-0 md-pl-15 md-pr-15 md-mb-30">
                        <div class="img-part">
                            <img class="" src="{{ asset('uploads/admission') }}/{{ $admission->admission_image }}" alt="About Image">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-70 md-pr-15">
                        <div class="sec-title">
                            <div class="sub-title orange">{{ $admission->admission_type }}</div>
                            <h2 class="title mb-17">{{ $admission->admission_department }}</h2>
                            <div class="bold-text mb-10">Admission Requirement</div>
                            <div class="desc">{!! $admission->requirment_description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End -->
    @endforeach
@endsection
@push('user_script')
@endpush
