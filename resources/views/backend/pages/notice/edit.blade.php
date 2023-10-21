@extends('backend.layout.master')
@section('title')
    Notice Edit
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Notice Edit'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('notice.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Notice List</a>
                        </div>

                        <form action="{{ route('notice.update',$notice->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="notice_title">Notice Title<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="notice_title"
                                    class="form-control @error('notice_title')
                                    is-invalid
                                    @enderror"
                                    id="notice_title" placeholder="enter notice title" value="{{ $notice->notice_title }}">
                                @error('notice_title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>File (PDF)<span class="text-danger">*</span></label>
                                <input type="file" name="file"
                                    class="form-control p-1 @error('file')
                                is-invalid
                                @enderror">
                                @error('file')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button class="btn btn-warning" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
