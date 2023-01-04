@extends('layouts.app')
@section('title')
    Kode TLHP
@endsection
{{-- @section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection --}}
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">dsdad</h3>
                            <div align="right">
                                <button id="createData" type="button" class="btn btn-success btn-sm"> <i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-12 table-responsive">

                                <table class="table table-striped table-bordered data-table">
                                    <form>
                                        <label for="tahun">Tahun:</label>
                                        <select name="tahun" id="tahun">
                                            <option value="">Semua Tahun</option>
                                            @for ($i = date('Y'); $i >= 1900; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label for="klarifikasi">Klarifikasi:</label>
                                        <select name="klarifikasi" id="klarifikasi">
                                            <option value="">Semua Klarifikasi</option>
                                            @foreach ($klarifikasis as $klarifikasi)
                                                <option value="{{ $klarifikasi->id }}">{{ $klarifikasi->name_obrik }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit">Filter</button>
                                    </form>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Kode</th>
                                            <th>Klarifikasi</th>
                                            <th>Nama</th>
                                            <th>Induk</th>
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
            <!-- /.container-fluid -->
    </section>
@endsection
@section('modal')
    <section class="content">
        <div class="container-fluid">
            <div class="modal fade" id="ajaxModel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeading"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="dataForm" name="dataForm" class="form-horizontal">
                                <input type="hidden" name="kode_id" id="kode_id">
                                <div class="form-group">
                                    <label for="kode" class="col-sm-2 control-label">Kode</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kode_tlhp" name="kode_tlhp"
                                            placeholder="Enter Kode" value="" maxlength="50" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-12">
                                        <textarea id="name_tlhp" name="name_tlhp" required="" placeholder="Enter Details" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                                        changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
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

    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
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
                ajax: {
                    url: "{{ route('pendaftaranobrik.index') }}",
                    data: function(d) {
                        d.tahun = $('#tahun').val();
                        d.klarifikasi = $('#klarifikasi').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'name_obrik',
                        name: 'name_obrik',
                        render: function(data, type, full, meta) {
                            return full.name_obrik;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'induk',
                        name: 'induk'
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
              Reload DataTable
              --------------------------------------------
              --------------------------------------------*/
            $('#tahun, #klarifikasi').change(function() {
                table.ajax.reload();
            });

            /*------------------------------------------
                --------------------------------------------
                Form Submit
                --------------------------------------------
                --------------------------------------------*/
            $('form').on('submit', function(event) {
                event.preventDefault();
                table.draw();
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
                $('#modelHeading').html("Tambah Data");
                $('#ajaxModel').modal('show');
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Edit Button
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.editData', function() {
                var kode_id = $(this).data('id');
                $.get("{{ route('pendaftaranobrik.index') }}" + '/' + kode_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Data");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#kode_id').val(data.id);
                    $('#name_tlhp').val(data.name_tlhp);
                    $('#kode_tlhp').val(data.kode_tlhp);

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
                confirm("Are You sure want to delete !");

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
            });

        });
    </script>
@endpush












{{-- <table class="table table-striped table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Kode</th>
                                                <th>Klarifikasi Obrik</th>
                                                <th>Nama</th>
                                                <th>Induk</th>
                                                <th width="180px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendaftaran_obriks as $pendaftaran_obrik)
                                                <tr>
                                                    <td>{{ $pendaftaran_obrik->tahun }}</td>
                                                    <td>{{ $pendaftaran_obrik->kode }}</td>
                                                    <td>{{ $pendaftaran_obrik->name_obrik }}</td>
                                                    <td>{{ $pendaftaran_obrik->nama }}</td>
                                                    <td>{{ $pendaftaran_obrik->induk }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="" class="btn btn-info btn-sm">Show</a>
                                                        <a href="" class="btn btn-danger btn-sm">delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> --}}
