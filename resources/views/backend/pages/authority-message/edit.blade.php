@extends('backend.layout.master')
@section('title')
    Authority Message Edit
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Authority Message Edit'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('authority-message.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Authority Message List</a>
                        </div>

                        <form action="{{ route('authority-message.update', $authorityMessage->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="authority_type">Authority Type<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="authority_type"
                                    class="form-control @error('authority_type')
                                is-invalid
                                @enderror"
                                    id="authority_type" placeholder="enter authority type" value="{{ $authorityMessage->authority_type }}">
                                @error('authority_type')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label class="form-label" for="authority_name">Authority Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="authority_name"
                                    class="form-control @error('authority_name')
                                is-invalid
                                @enderror"
                                    id="authority_name" placeholder="enter authority name" value="{{ $authorityMessage->authority_name }}">
                                @error('authority_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Authority Message<span class="text-danger">*</span></label>
                                <textarea name="authority_message" id="editor" cols="30" rows="5"
                                    class="form-control @error('authority_message')
                                is-invalid
                                @enderror">{{ $authorityMessage->authority_message }}</textarea>
                                @error('authority_message')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Authority Image</label>
                                <input type="file" name="authority_image"
                                    data-default-file="{{ asset('uploads/authority-message') }}/{{ $authorityMessage->authority_image }}"
                                    class="form-control dropify @error('authority_image')
                                is-invalid
                                @enderror">
                                @error('authority_image')
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
