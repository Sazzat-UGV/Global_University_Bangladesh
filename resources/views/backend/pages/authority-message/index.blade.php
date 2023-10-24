@extends('backend.layout.master')
@section('title')
    Authority Message List
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
    @include('backend.layout.inc.breadcump', ['page_name' => 'Authority Message List'])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap py-4 ">
                            <table id="example" class="table table-hover text-dark" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Created at</th>
                                        <th>Image</th>
                                        <th>Authority Type</th>
                                        <th>Authority Name</th>
                                        @if (Auth::user()->haspermission('message-edit'))
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($authorityMessages as $index => $message)
                                        <tr>
                                            <td class="text-wrap"><strong>{{ $index + 1 }}</strong></td>
                                            <td class="text-wrap">{{ $message->created_at->format('d-M-Y') }}</td>
                                            <td><img src="{{ asset('uploads/authority-message') }}/{{ $message->authority_image }}"
                                                    alt="authority image" class="w-25 rounded-circle"></td>
                                            <td class="text-wrap">{{ $message->authority_type }}</td>
                                            <td class="text-wrap">{{ $message->authority_name }}</td>
                                            <td>
                                                <div class="actions d-flex justify-content-start">

                                                    <a href="" class="btn btn-sm btn-outline-info mr-1"
                                                        data-toggle="modal" data-target="#myModal-{{ $message->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    @if (Auth::user()->haspermission('message-edit'))
                                                        <div class="">
                                                            <a href="{{ route('authority-message.edit', $message->id) }}"
                                                                class="btn btn-sm btn-outline-primary mr-1">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="myModal-{{ $message->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModal-{{ $message->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal-{{ $message->id }}Label">
                                                            Message</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body text-wrap">
                                                                <p><span>{!! $message->authority_message !!}</span></p>
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
