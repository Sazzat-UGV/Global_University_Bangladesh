@extends('backend.layout.master')
@section('title')
    Result Edit
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Result Edit'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('result.index') }}" class=" btn btn-primary shadow-sm"><i
                                    class="fas fa-arrow-left text-white-50"></i> Back to Result List</a>
                        </div>

                        <form action="{{ route('result.update',$result->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Result For<span class="text-danger">*</span></label>
                                <select class="custom-select @error('result_for') is-invalid @enderror" name="result_for">
                                    <option value="CSE" {{ $result->result_for == 'CSE' ? 'selected' : '' }}>CSE</option>
                                    <option value="EEE" {{ $result->result_for == 'EEE' ? 'selected' : '' }}>EEE</option>
                                    <option value="BBA" {{ $result->result_for == 'BBA' ? 'selected' : '' }}>BBA</option>
                                    <option value="MBA" {{ $result->result_for == 'MBA' ? 'selected' : '' }}>MBA</option>
                                    <option value="EMBA" {{ $result->result_for == 'EMBA' ? 'selected' : '' }}>EMBA</option>
                                    <option value="LLB" {{ $result->result_for == 'LLB' ? 'selected' : '' }}>LLB</option>
                                    <option value="LLM" {{ $result->result_for == 'LLM' ? 'selected' : '' }}>LLM</option>
                                    <option value="ENGLISH" {{ $result->result_for == 'ENGLISH' ? 'selected' : '' }}>ENGLISH</option>
                                    <option value="LIBRARY & INFORMATION SCIENCE" {{ $result->result_for == 'LIBRARY & INFORMATION SCIENCE' ? 'selected' : '' }}>LIBRARY & INFORMATION SCIENCE</option>
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
                                    id="result_title" placeholder="enter result title" value="{{ $result->result_title }}">
                                @error('result_title')
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
