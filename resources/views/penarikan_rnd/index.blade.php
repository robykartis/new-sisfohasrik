@extends('layouts.app')
@section('title')
    Data
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
    <style>
        .table-data {
            width: 100%;
            /* untuk membuat tabel selebar layar */
            overflow-x: auto;
            /* untuk menambahkan scroll horizontal jika tabel melebihi layar */
            border-spacing: 10px;
            font-size: 14px;
            text-align: center;
            padding-top: 20px;
            /* memberikan jarak 20px pada atas */
            padding-right: 30px;
            /* memberikan jarak 30px pada kanan */
            padding-bottom: 40px;
            /* memberikan jarak 40px pada bawah */
            padding-left: 50px;
            /* memberikan jarak 50px pada kiri */
        }

        .table-data thead {
            background-color: #1a5e1a;
            /* atau "lightgreen" */
            color: white;
        }

        @media screen and (max-width: 600px) {

            .table-data th,
            .table-data td {
                display: block;
                /* untuk mengubah tampilan tabel menjadi block */
            }

            .table-data th {
                text-align: left;
                /* untuk mengatur posisi teks */
            }
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
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{ $title_lhp }} - ID = {{ $data->id }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="container">
                                        <tr>
                                            <td class="item">Tahun</td>
                                            <td class="text"> {{ $data->tahun }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Klarifikasi Obrik</td>
                                            <td class="text"> {{ $data->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">No LHP</td>
                                            <td class="text"> {{ $data->no_lhp }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Nama Obrik</td>
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
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{ $title_temuan }} - ID = {{ $temuan->id }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="container">
                                        <tr>
                                            <td class="item">No Temuan</td>
                                            <td class="text"> {{ $temuan->no_temuan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Judul Temuan</td>
                                            <td class="text"> {{ $temuan->judul_temuan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Kode Temuan</td>
                                            <td class="text"> {{ $kode->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Bidang</td>
                                            <td class="text"> {{ $kode->bidang }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header">
                                <h3 class="card-title">Data Penarikan RND</h3>

                            </div>
                            <div class="card-body pt-3">
                                <table class="table-data" border="1">
                                    <thead>
                                        <tr>
                                            <th colspan="3" style="text-align: center;">Total Kerugian Negara (Rp.)
                                            </th>
                                            <th colspan="3" style="text-align: center;">Total Kerugian Daerah (Rp.)
                                            </th>
                                            <th colspan="3" style="text-align: center;">Total Kerugian Negara +
                                                Daerah (Rp.)</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center;">Nilai</th>
                                            <th style="text-align: center;">Ditarik</th>
                                            <th style="text-align: center;">Sisa</th>

                                            <th style="text-align: center;">Nilai</th>
                                            <th style="text-align: center;">Ditarik</th>
                                            <th style="text-align: center;">Sisa</th>

                                            <th style="text-align: center;">Nilai</th>
                                            <th style="text-align: center;">Ditarik</th>
                                            <th style="text-align: center;">Sisa</th>

                                        </tr>
                                    </thead>
                                    <tbody>



                                        <tr>
                                            <td>{{ $data_rnd->jml_rnd_neg }}</td>
                                            <td>ss</td>
                                            <td>sfs</td>

                                            <td>{{ $data_rnd->jml_rnd_drh }}</td>
                                            <td>Baris 1, Kolom 2</td>
                                            <td>Baris 1, Kolom 3</td>

                                            <td>{{ $nilai_total_kerugian }}</td>
                                            <td>Baris 1, Kolom 2</td>
                                            <td>Baris 1, Kolom 3</td>
                                        </tr>

                                        {{-- <tr>
                                                <td>Tidak ada data yang ditemukan</td>
                                            </tr>
                                        --}}

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header">
                                <h3 class="card-title">Data Penarikan RND</h3>
                                <div class="card-tools">
                                    <a href="{{ route('penarikanrnd.create', $temuan->id) }}"
                                        class="btn btn-success btn-sm" title="Add">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body pt-3">
                                <table class="table-data" border="1">
                                    <thead>
                                        <tr>
                                            <th colspan="7" style="text-align: center;">Rincian Penarikan RND
                                            </th>

                                        </tr>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Tanggal Penarikan</th>
                                            <th style="text-align: center;">Jumlah Penarikan Negara</th>
                                            <th style="text-align: center;" style="width: 5%">Jumlah Penarikan Daerah</th>
                                            <th style="text-align: center;" style="width: 40%">Keterangan</th>
                                            <th style="text-align: center;" style="width: 5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_penarikan as $data)
                                            <tr>
                                                <td>1</td>
                                                @if (isset($data->tgl_penarikan))
                                                    <td>{{ \Illuminate\Support\Carbon::parse($data->tgl_penarikan)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                @else
                                                    <td>{{ 'Tanggal tidak tersedia' }}</td>
                                                @endif
                                                <td>{{ isset($data->jml_penarikan_neg) ? $data->jml_penarikan_neg : ' tidak tersedia data penarikan NEG' }}
                                                </td>
                                                <td>{{ isset($data->jml_penarikan_drh) ? $data->jml_penarikan_drh : ' tidak tersedia data penarikan DRH' }}
                                                </td>
                                                <td>{{ isset($data->keterangan) ? $data->keterangan : 'keterangan tidak tersedia' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('penarikanrnd.edit', $data->id) }}">Edit</a> |
                                                    <a href="">Detail</a> |
                                                    <a href="">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>

                                            <td colspan="2"><b>TOTAL</b></td>
                                            <td><b>123</b></td>
                                            <td><b>123</b></td>
                                            <td colspan="2"><b></b></td>

                                        </tr>
                                        {{-- <tr>
                                                <td>Tidak ada data yang ditemukan</td>
                                            </tr>
                                        --}}

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ route('temuan.show', $id) }}" class="btn btn-secondary">Kembali</a>
        </div>
        <!-- /.card-footer -->
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
@endpush