@extends('backend.layout.master')
@section('title')
    Requirement Create
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Requirement Create'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('requirment.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Requirment List</a>
                        </div>

                        <form action="{{ route('requirment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Admission Type<span class="text-danger">*</span></label>
                                <select class="custom-select @error('admission_type') is-invalid @enderror"
                                    name="admission_type">
                                    <option value="Undergraduate Admission">Undergraduate Admission</option>
                                    <option value="Postgraduate Admission">Postgraduate Admission</option>
                                </select>
                                @error('admission_type')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Admission Department<span class="text-danger">*</span></label>
                                <select class="custom-select @error('admission_department') is-invalid @enderror"
                                    name="admission_department">
                                    <option value="Computer Science and Engineering">Computer Science and Engineering
                                    </option>
                                    <option value="Electrical and Electronics Engineering">Electrical and Electronics
                                        Engineering</option>
                                    <option value="Bachelor of Business Administration">Bachelor of Business Administration
                                    </option>
                                    <option value="Master of Business Administration">Master of Business Administration
                                    </option>
                                    <option value="Executive MBA">Executive MBA</option>
                                    <option value="Bachelor of Laws">Bachelor of Laws</option>
                                    <option value="Master of Laws">Master of Laws</option>
                                    <option value="English">English</option>
                                    <option value="GUB Center for Language">GUB Center for Language</option>
                                    <option value="Library & Information Science">Library & Information Science</option>
                                </select>
                                @error('admission_department')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Requirment Description<span class="text-danger">*</span></label>
                                <textarea name="requirment_description" id="editor" cols="30" rows="5"
                                        class="form-control @error('requirment_description')
                                is-invalid
                                @enderror">{{ old('requirment_description') }}</textarea>
                                    @error('requirment_description')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label>Admission Image (620*490)<span class="text-danger">*</span></label>
                                <input type="file" name="admission_image"
                                    class="form-control dropify @error('admission_image')
                                is-invalid
                                @enderror">
                                @error('admission_image')
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

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop your image here or click',
            }
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
