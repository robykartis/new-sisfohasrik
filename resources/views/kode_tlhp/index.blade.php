@extends('layouts.v1.app')
@section('title')
    Kode TLHP
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link href="{{ asset('ltr/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">{{ $title }}</h5>
                        <div class="ms-auto">

                            <button id="createData" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="row">
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <form id="dataForm" name="dataForm">
                        <div class="modal-body">
                            <input type="hidden" name="kode_id" id="kode_id">
                            <div class="form-group">
                                <label for="kode" class="col-sm-2 control-label">Kode</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="kode" name="kode"
                                        placeholder="Enter Kode" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <textarea id="nama" name="nama" required="" placeholder="Enter Details" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                                changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('ltr/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/js/table-datatable.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



    <script type="text/javascript">
        function confirmDelete() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
    {{-- Action Tambah Data --}}

    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
             --------------------------------------------
             Pass Header Token
             --------------------------------------------
             --------------------------------------------*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*------------------------------------------
            --------------------------------------------
            Render DataTable
            --------------------------------------------
            --------------------------------------------*/
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kodetlhp.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Button
            --------------------------------------------
            --------------------------------------------*/
            $('#createData').click(function() {
                $('#saveBtn').val("Save");
                $('#kode_id').val('');
                $('#dataForm').trigger("reset");
                $('#modelHeading').html("Input Daftar Kode Tindak Lanjut");
                $('#ajaxModel').modal('show');
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Edit Button
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.editData', function() {
                var kode_id = $(this).data('id');
                $.get("{{ route('kodetlhp.index') }}" + '/' + kode_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Daftar Kode Tindak Lanjut");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#kode_id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#kode').val(data.kode);

                })

            });

            /*------------------------------------------
            --------------------------------------------
            Create Product Code
            --------------------------------------------
            --------------------------------------------*/
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#dataForm').serialize(),
                    url: "{{ route('kodetlhp.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        // Tambahkan toastr untuk menampilkan pesan sukses
                        if ($('#saveBtn').val() == 'Save') {
                            toastr.success('Data berhasil ditambahkan.', 'Sukses', {
                                timeOut: 5000
                            });
                        } else {
                            toastr.success('Data berhasil diupdate.', 'Sukses', {
                                timeOut: 5000
                            });
                        }
                        $('#dataForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            Delete Product Code
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.deleteData', function() {
                var kode_id = $(this).data("id");
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    // Jalankan aksi untuk menghapus data
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('kodetlhp.store') }}" + '/' + kode_id,
                        success: function(data) {
                            // Tambahkan toastr untuk menampilkan pesan sukses
                            toastr.success('Data berhasil dihapus.', 'Sukses', {
                                timeOut: 5000
                            });
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });

        });
    </script>
@endpush
