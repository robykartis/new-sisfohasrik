@extends('layouts.app')
@section('title')
    Daftar Kode Tindak Lanjut
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
    <style type="text/css">
        th {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        table.dataTable td.child {
            text-align: left;
        }
    </style>
@endpush
@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-tools">
                    <button id="createForm" class="btn btn-success btn-sm" title="Add">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th class="nowrap text-overflow" style="width: 5%">No</th>
                            <th class="nowrap text-overflow" style="width: 10%">Kode</th>
                            <th class="nowrap text-overflow">Nama</th>
                            <th class="nowrap text-overflow" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card -->
    </section>
@endsection
@section('modal')
    <div class="modal fade" id="ajaxModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                                <textarea id="nama" name="nama" required="" placeholder="Enter Details" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="saveBtn" value="create" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('kodetlhp.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'kode',
                        name: 'kode',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: "text-center",
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
            $('#createForm').click(function() {
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
                if (document.getElementById("kode").value == "") {
                    toastr.error("Kode harus diisi");
                    return;
                } else if (document.getElementById("nama").value == "") {
                    toastr.error("Nama harus diisi");
                    return;
                }
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
