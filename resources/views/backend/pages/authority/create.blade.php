@extends('backend.layout.master')
@section('title')
    Authority Create
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Authority Create'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('authority.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Authority List</a>
                        </div>

                        <form action="{{ route('authority.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Authority Type<span class="text-danger">*</span></label>
                                <select class="custom-select @error('authority_type') is-invalid @enderror" name="authority_type">
                                    <option value="Board of Trustees">Board of Trustees</option>
                                    <option value="Syndicate Members">Syndicate Members</option>
                                    <option value="Academic Members">Academic Members</option>
                                </select>
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
                                    id="authority_name" placeholder="enter authority name" value="{{ old('authority_name') }}">
                                @error('authority_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="authority_designation">Authority Designation<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="authority_designation"
                                    class="form-control @error('authority_designation')
                                    is-invalid
                                    @enderror"
                                    id="authority_designation" placeholder="enter authority designation" value="{{ old('authority_designation') }}">
                                @error('authority_designation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Authority Image<span class="text-danger">*</span></label>
                                <input type="file" name="authority_image"
                                    class="form-control dropify @error('authority_image')
                                is-invalid
                                @enderror">
                                @error('authority_image')
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
