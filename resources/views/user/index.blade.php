@extends('layouts.app')
@section('title')
    User
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar List User</h3>
                            <div align="right">
                                <button type="button" name="create_record" id="create_record" class="btn btn-success"> <i
                                        class="fas fa-user-plus"></i> Add</button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-12 table-responsive">

                                <table class="table table-striped table-bordered user_datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th width="180px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@section('modal')
    <section class="content">
        <div class="container-fluid">
            <div class="modal fade" id="formModal" aria-labelledby="ModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" id="sample_form" class="form-horizontal">
                            <div class="modal-header">
                                <h4 class="modal-title" id="ModalLabel">Large Modal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span id="form_result"></span>
                                <div class="form-group">
                                    <label>Name : </label>
                                    <input type="text" name="name" id="name" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label>Email : </label>
                                    <input type="email" name="email" id="email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control" name="level" id="level">
                                        <option selected disabled>Select Level Account</option>
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                        <option value="readonly">ReadOnly</option>
                                    </select>
                                </div>
                                <div class="form-group editpass">
                                    <label>Password : </label>
                                    <input type="password" name="password" id="password" class="form-control" />
                                </div>
                                <input type="hidden" name="action" id="action" value="Add" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="action_button" id="action_button"
                                    value="Add">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <div class="modal fade"id="confirmModal" aria-labelledby="ModalLabel">
                <div class="modal-dialog modal-sm ">
                    <div class="modal-content">
                        <form method="post" id="sample_form" class="form-horizontal">
                            <div class="modal-header">
                                <h4 class="modal-title" id="ModalLabel">Konfirmasi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Klik Oke untuk lanjutkan&hellip;</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" name="ok_button"
                                    id="ok_button">Oke</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@endsection
@push('js')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.user_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });



        var user_id;

        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "users/destroy/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        $('#user_datatable').DataTable().ajax.reload();
                        alert('Data Deleted');
                    }, 2000);
                }
            })
        });
    });
</script>
<script>
    // success message popup notification
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    // info message popup notification
    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    // warning message popup notification
    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif

    // error message popup notification
    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
</script>
@endpush
