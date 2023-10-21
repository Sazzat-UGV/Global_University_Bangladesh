@extends('backend.layout.master')
@section('title')
    Notice List
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
    @include('backend.layout.inc.breadcump', ['page_name' => 'Notice List'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        @can('notice-create')
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('notice.create') }}" class=" btn btn-primary shadow-sm"><i
                                        class="fas fa-plus-circle text-white-50"></i> Create New Notice</a>
                            </div>
                        @endcan
                        <div class="table-responsive text-nowrap py-4 ">
                            <table id="example" class="table table-hover text-dark" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Published at</th>
                                        <th>Notice Title</th>
                                        @can('notice-edit')
                                            <th>Status</th>
                                        @endcan
                                        @if (Auth::user()->haspermission('notice-edit') ||
                                                Auth::user()->haspermission('notice-delete') ||
                                                Auth::user()->haspermission('notice-download'))
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($notices as $index=>$notice)
                                        <tr>
                                            <td class="text-wrap"><strong>{{ $index + 1 }}</strong></td>
                                            <td class="text-wrap">{{ $notice->created_at->format('d-M-Y') }}</td>
                                            <td class="text-wrap">{{ $notice->notice_title }}</td>
                                            <td class="text-wrap">
                                                <div class="custom-control custom-switch">
                                                    <input class="custom-control-input toggle-class" type="checkbox"
                                                        data-id="{{ $notice->id }}" id="notice-{{ $notice->id }}"
                                                        {{ $notice->is_active ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="notice-{{ $notice->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="actions d-flex justify-content-start">
                                                    @if (Auth::user()->haspermission('notice-download'))
                                                        <div class="">
                                                            <a href="{{ route('admin.downloadNotice', ['id' => $notice->id, 'file_name' => $notice->file]) }}"
                                                                class="btn btn-sm btn-outline-primary mr-1" target="blank">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if (Auth::user()->haspermission('notice-edit'))
                                                        <div class="">
                                                            <a href="{{ route('notice.edit', $notice->id) }}"
                                                                class="btn btn-sm btn-outline-primary mr-1">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                        </div>
                                                    @endif


                                                    @if (Auth::user()->haspermission('notice-delete'))
                                                        <form action="{{ route('notice.destroy', $notice->id) }}"
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
                    url: '/admin/notice/is_active/' + item_id,
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
