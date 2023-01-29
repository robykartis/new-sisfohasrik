@extends('layouts.app')
@section('title')
    Laporan Hasil Pemeriksaan (LHP)
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">

    <style>
        .container {
            width: 100%;
            border-collapse: collapse;
        }

        .item {
            width: 25%;
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        .text {
            width: 75%;
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card card-warning">
            <div class="card-header ">
                <h3 class="card-title">{{ $title }}</h3>

            </div>
            <div class="card-body">
                <div class="card-body pb-0">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">

                                </div>
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="container">
                                            <tr>
                                                <td class="item">Tahun</td>
                                                <td class="text"> {{ $data->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">No LHP</td>
                                                <td class="text"> {{ $data->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Nama Obrik</td>
                                                <td class="text"> {{ $data->no_lhp }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Klarifikasi Obrik</td>
                                                <td class="text"> {{ $data->nama_obrik }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Tanggal LHP</td>
                                                <td class="text"> {{ $tgl_lhp }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table row -->
                    <div class="row">
                        <div class="card col-12">
                            <div class="card-header">
                                <h3 class="card-title"><b>{{ $title_temuan }}</b></h3>
                                <div class="card-tools">
                                    <a href="{{ route('temuan.create', $id) }}" class="btn btn-success btn-sm"
                                        title="Add">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped data-table">
                                        <thead>
                                            <tr>
                                                <th class="nowrap text-overflow">No</th>
                                                <th class="nowrap text-overflow">No Temuan</th>
                                                <th class="nowrap text-overflow">Judul Temuan</th>
                                                <th class="nowrap text-overflow">Bidang</th>
                                                <th class="nowrap text-overflow">Kode Temuan</th>
                                                <th class="nowrap text-overflow">Jumlah Kerugian Negara (01)</th>
                                                <th class="nowrap text-overflow">Jumlah Wajib Setor (02)</th>
                                                <th class="nowrap text-overflow">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('lhp.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

    <script>
        var rupiah = document.getElementById(".rupiah");
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>

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
            var id = {{ $id }};
            var table = $('.data-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('lhp.show', $id) }}",
                    type: "GET",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'no_temuan',
                        name: 'no_temuan',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'judul_temuan',
                        name: 'judul_temuan',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'kode_bidang_nama',
                        name: 'kode_bidang_nama',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'kode_temuan_kode',
                        name: 'kode_temuan_kode',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('word-break', 'break-all');
                        }
                    },
                    {
                        data: 'jml_rnd_neg',
                        name: 'jml_rnd_neg',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).text(formatRupiah(cellData, "Rp. "));
                            $(td).addClass("mask-money");
                            $(td).css('word-break', 'break-all');

                        }
                    },
                    {
                        data: 'jml_snd_neg',
                        name: 'jml_snd_neg',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).text(formatRupiah(cellData, "Rp. "));
                            $(td).addClass("mask-money");
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
                $('#modelHeading').html("Input Daftar Kode Temuan Pemeriksaan");
                $('#ajaxModel').modal('show');
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Edit Button
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.editForm', function() {
                var kode_id = $(this).data('id');
                $.get("{{ route('lhp.index') }}" + '/' + kode_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Daftar Kode Temuan Pemeriksaan");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#kode_id').val(data.id);

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
                    url: "{{ route('lhp.store') }}",
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
            var lhp_id;

            $(document).on('click', '.delete', function() {
                lhp_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function() {
                $.ajax({
                    url: "lhp/hapus/" + lhp_id,
                    beforeSend: function() {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            alert('Data Deleted');
                        }, 2000);
                    }
                })
            });

        });
    </script>
@endpush
