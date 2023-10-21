@extends('backend.layout.master')
@section('title')
    Result Create
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Result Create'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('result.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Result List</a>
                        </div>

                        <form action="{{ route('result.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Result For<span class="text-danger">*</span></label>
                                <select class="custom-select @error('result_for') is-invalid @enderror" name="result_for">
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="BBA">BBA</option>
                                    <option value="MBA">MBA</option>
                                    <option value="EMBA">EMBA</option>
                                    <option value="LLB">LLB</option>
                                    <option value="LLM">LLM</option>
                                    <option value="ENGLISH">ENGLISH</option>
                                    <option value="LIBRARY & INFORMATION SCIENCE">LIBRARY & INFORMATION SCIENCE</option>
                                </select>
                                @error('result_for')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="result_title">Result Title<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="result_title"
                                    class="form-control @error('result_title')
                                    is-invalid
                                    @enderror"
                                    id="result_title" placeholder="enter result title" value="{{ old('result_title') }}">
                                @error('result_title')
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

                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
