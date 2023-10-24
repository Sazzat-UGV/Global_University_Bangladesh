@extends('frontend.layout.master')
@section('title')
    Authority Message
@endsection
@push('user_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'Authority Message', 'sub_page_name' => ''])
    <div class="container">
        <div class="row">
            <div class="col-12 m-3">
                <div class="">
                    <img class="w-25 rounded" src="{{ asset('uploads/authority-message') }}/{{ $messageDetails->authority_image }}" alt="">
                </div>
            </div>
            <div class="col-12 m-3">
                {!! $messageDetails->authority_message !!}
            </div>
        </div>
    </div>
@endsection
@push('user_script')
@endpush
