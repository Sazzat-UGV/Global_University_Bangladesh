@extends('backend.layout.master')
@section('title')
    Faculty Create
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Faculty Create'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('faculty.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Faculty List</a>
                        </div>

                        <form action="{{ route('faculty.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Faculty Department<span class="text-danger">*</span></label>
                                <select class="custom-select @error('faculty_department') is-invalid @enderror" name="faculty_department">
                                    <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                                    <option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
                                    <option value="Bachelor of Business Administration">Bachelor of Business Administration</option>
                                    <option value="Master of Business Administration">Master of Business Administration</option>
                                    <option value="Executive MBA">Executive MBA</option>
                                    <option value="Bachelor of Laws">Bachelor of Laws</option>
                                    <option value="Master of Laws">Master of Laws</option>
                                    <option value="English">English</option>
                                    <option value="GUB Center for Language">GUB Center for Language</option>
                                    <option value="Library & Information Science">Library & Information Science</option>
                                </select>
                                @error('faculty_department')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="faculty_name">Faculty Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="faculty_name"
                                    class="form-control @error('faculty_name')
                                    is-invalid
                                    @enderror"
                                    id="faculty_name" placeholder="enter faculty name" value="{{ old('faculty_name') }}">
                                @error('faculty_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="faculty_designation">Faculty Designation<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="faculty_designation"
                                    class="form-control @error('faculty_designation')
                                    is-invalid
                                    @enderror"
                                    id="faculty_designation" placeholder="enter faculty designation" value="{{ old('faculty_designation') }}">
                                @error('faculty_designation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Faculty Image<span class="text-danger">*</span></label>
                                <input type="file" name="faculty_image"
                                    class="form-control dropify @error('faculty_image')
                                is-invalid
                                @enderror">
                                @error('faculty_image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop your image here or click',
    }
});
</script>
@endpush
