@extends('backend.layout.master')
@section('title')
    Faculty Edit
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Faculty Edit'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('faculty.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Faculty List</a>
                        </div>

                        <form action="{{ route('faculty.update', $faculty->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Faculty Department<span class="text-danger">*</span></label>
                                <select class="custom-select @error('faculty_department') is-invalid @enderror"
                                    name="faculty_department">
                                    <option value="Computer Science and Engineering"
                                        {{ $faculty->faculty_department == 'Computer Science and Engineering' ? 'selected' : '' }}>
                                        Computer Science and Engineering</option>
                                    <option value="Electrical and Electronics Engineering"
                                        {{ $faculty->faculty_department == 'Electrical and Electronics Engineering' ? 'selected' : '' }}>
                                        Electrical and Electronics Engineering</option>
                                    <option value="Bachelor of Business Administration"
                                        {{ $faculty->faculty_department == 'Bachelor of Business Administration' ? 'selected' : '' }}>
                                        Bachelor of Business Administration</option>
                                    <option value="Master of Business Administration"
                                        {{ $faculty->faculty_department == 'Master of Business Administration' ? 'selected' : '' }}>
                                        Master of Business Administration</option>
                                    <option value="Executive MBA"
                                        {{ $faculty->faculty_department == 'Executive MBA' ? 'selected' : '' }}>Executive
                                        MBA</option>
                                    <option value="Bachelor of Laws"
                                        {{ $faculty->faculty_department == 'Executive MBA' ? 'selected' : '' }}>Bachelor of
                                        Laws</option>
                                    <option value="Master of Laws"
                                        {{ $faculty->faculty_department == 'Master of Laws' ? 'selected' : '' }}>Master of
                                        Laws</option>
                                    <option value="English"
                                        {{ $faculty->faculty_department == 'English' ? 'selected' : '' }}>English
                                    </option>
                                    <option value="GUB Center for Language"
                                        {{ $faculty->faculty_department == 'GUB Center for Language' ? 'selected' : '' }}>
                                        GUB Center for Language</option>
                                    <option value="Library & Information Science"
                                        {{ $faculty->faculty_department == 'Library & Information Science' ? 'selected' : '' }}>
                                        Library & Information Science</option>
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
                                    id="faculty_name" placeholder="enter faculty name"
                                    value="{{ $faculty->faculty_name }}">
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
                                    id="faculty_designation" placeholder="enter faculty designation"
                                    value="{{ $faculty->faculty_designation }}">
                                @error('faculty_designation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Faculty Image<span class="text-danger">*</span></label>
                                <input type="file" name="faculty_image"
                                    data-default-file="{{ asset('uploads/faculty') }}/{{ $faculty->faculty_image }}"
                                    class="form-control dropify @error('faculty_image')
                                is-invalid
                                @enderror">
                                @error('faculty_image')
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
