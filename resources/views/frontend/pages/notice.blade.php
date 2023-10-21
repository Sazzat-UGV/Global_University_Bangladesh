@extends('frontend.layout.master')
@section('title')
    Notices
@endsection
@push('user_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'Notices', 'sub_page_name' => ''])

    <!-- Latest Events Section Start -->
    <div class="rs-latest-events style1 bg-wrap pt-100 md-pt-70 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 lg-pl-0">
                    <div class="event-wrap">

                        @foreach ($notices as $index => $notice)
                            @php
                                $bgClasses = ['bgc1', 'bgc2', 'bgc3'];
                                $classIndex = $index % count($bgClasses);
                                $bgClass = $bgClasses[$classIndex];
                            @endphp

                            <div class="events-short mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                <div class="date-part {{ $bgClass }}">
                                    <span class="month">{{ $notice->created_at->format('F') }}</span>
                                    <div class="date">{{ $notice->created_at->format('d') }}</div>
                                </div>
                                <div class="content-part">
                                    <div class="categorie"><a href="#">Notice</a></div>
                                    <h4 class="title mb-0">
                                        <a href="{{ route('admin.downloadNotice', ['id' => $notice->id, 'file_name' => $notice->file]) }}"
                                            target="blank">
                                            {{ $notice->notice_title }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach


                        {{ $notices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Events Section End -->
@endsection
@push('user_script')
@endpush
