@extends('frontend.layout.master')
@section('title')
    Results
@endsection
@push('user_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'Results', 'sub_page_name' => $department])

    <!-- Latest Events Section Start -->
    <div class="rs-latest-events style1 bg-wrap pt-100 md-pt-70 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 lg-pl-0">
                    <div class="event-wrap">

                        @foreach ($results as $result)
                            <div class="events-short mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                <div class="date-part bgc1">
                                    <span class="month">{{ $result->created_at->format('F') }}</span>
                                    <div class="date">{{ $result->created_at->format('d') }}</div>
                                </div>
                                <div class="content-part">
                                    <div class="categorie"><a href="#">{{ $result->result_for }}</a>
                                    </div>
                                    <h4 class="title mb-0"><a
                                            href="{{ route('admin.downloadResult', ['id' => $result->id, 'file_name' => $result->file]) }}">{{ $result->result_title }}</a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach

                        {{ $results->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Events Section End -->
@endsection
@push('user_script')
@endpush
