@extends('backend.layout.master')
@section('title')
    Requirment List
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        .text-wrap {
            white-space: normal !important;
            /* Enable text wrapping */
            word-wrap: break-word;
            /* Wrap long words */
        }
    </style>
@endpush
@section('content')
    @include('backend.layout.inc.breadcump', ['page_name' => 'Requirment List'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        @can('requirment-create')
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('requirment.create') }}" class=" btn btn-primary shadow-sm"><i
                                        class="fas fa-plus-circle text-white-50"></i> Create New Requirment</a>
                            </div>
                        @endcan
                        <div class="table-responsive text-nowrap py-4 ">
                            <table id="example" class="table table-hover text-dark" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Created at</th>
                                        <th>Image</th>
                                        <th>Admission Type</th>
                                        <th>Admission Department</th>
                                        @can('requirment-edit')
                                            <th>Status</th>
                                        @endcan
                                        @if (Auth::user()->haspermission('requirment-edit') || Auth::user()->haspermission('requirment-delete'))
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($requirments as $index => $requirment)
                                        <tr>
                                            <td class="text-wrap"><strong>{{ $index + 1 }}</strong></td>
                                            <td class="text-wrap">{{ $requirment->created_at->format('d-M-Y') }}</td>
                                            <td><img src="{{ asset('uploads/admission') }}/{{ $requirment->admission_image }}"
                                                    alt="admission image" class="w-75"></td>
                                            <td class="text-wrap">{{ $requirment->admission_type }}</td>
                                            <td class="text-wrap">{{ $requirment->admission_department }}</td>
                                            <td class="text-wrap">
                                                <div class="custom-control custom-switch">
                                                    <input class="custom-control-input toggle-class" type="checkbox"
                                                        data-id="{{ $requirment->id }}"
                                                        id="requirment-{{ $requirment->id }}"
                                                        {{ $requirment->is_active ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="requirment-{{ $requirment->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="actions d-flex justify-content-start">


                                                    <a href="" class="btn btn-sm btn-outline-info mr-1"
                                                        data-toggle="modal" data-target="#myModal-{{ $requirment->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    @if (Auth::user()->haspermission('requirment-edit'))
                                                        <div class="">
                                                            <a href="{{ route('requirment.edit', $requirment->id) }}"
                                                                class="btn btn-sm btn-outline-primary mr-1">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                        </div>
                                                    @endif


                                                    @if (Auth::user()->haspermission('requirment-delete'))
                                                        <form action="{{ route('requirment.destroy', $requirment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class=" btn btn-sm  btn-outline-danger show_confirm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="myModal-{{ $requirment->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModal-{{ $requirment->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModal-{{ $requirment->id }}Label">
                                                            Details</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body text-wrap">
                                                                <p><span class="text-success">Description: </span></p>
                                                                <p><span>{!! $requirment->requirment_description !!}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Close</button>

                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            $('.toggle-class').change(function() {
                var is_active = $(this).prop('checked') == true ? 1 : 0;
                var item_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/requirment/is_active/' + item_id,
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                            'Status Updated!',
                            'Click ok button!',
                            'success'
                        )
                    },
                    errro: function(err) {
                        if (err) {
                            console.log(err);
                        }
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('#example').DataTable({
                pagingType: 'first_last_numbers',
            });

            $('.show_confirm').click(function(event) {
                let form = $(this).closest('form');

                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endpush
