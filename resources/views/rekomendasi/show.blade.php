@extends('layouts.app')
@section('title')
    Detail Data
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">

    <style>
        .form-control:focus {
            border-color: red;
        }

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
                <h3 class="card-title">Rekomendasi Penyelesaian</h3>
                <div class="card-tools">

                </div>
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                LHP - ID = {{ $data->lhp_id }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="container">
                                        <tr>
                                            <td class="item">Tahun</td>
                                            <td class="text"> {{ $data->lhp_tahun }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Klarifikasi Obrik</td>
                                            <td class="text"> {{ $data->klarifikasi_obrik_nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">No LHP</td>
                                            <td class="text"> {{ $data->lhp_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Nama Obrik</td>
                                            <td class="text"> {{ $data->obrik_nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Tanggal LHP</td>
                                            <td class="text"> {{ $data_tgl_lhp }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                Temuan - ID = {{ $data->temuan_id }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="container">
                                        <tr>
                                            <td class="item">No Temuan</td>
                                            <td class="text"> {{ $data->temuan_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Judul Temuan</td>
                                            <td class="text"> {{ $data->temuan_judul }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Kode Temuan</td>
                                            <td class="text"> {{ $data->kod_temuan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Bidang</td>
                                            <td class="text"> {{ $data->bidang_temuan }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                Rekomendasi - ID = {{ $data_rekomendasi->id }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="container">
                                        <tr>
                                            <td class="item">No </td>
                                            <td class="text"> {{ $data_rekomendasi->no_rekomendasi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Kode Rekomendasi </td>
                                            <td class="text"> {{ $kod_rekomendasi->kode_rekomendasi_kode }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Uraian Rekomendasi</td>
                                            <td class="text"> {!! $data_rekomendasi->uraian_rekomendasi !!}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                Data TLHP - ID = {{ $data_rekomendasi->id }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="container">
                                        <tr>
                                            <td class="item">Tanggal TLHP </td>
                                            <td class="text"> {{ $data_tgl_rekomendasi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Kode TLHP </td>
                                            <td class="text"> {{ $kod_rekomendasi->kode_tlhp_kode }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Uraian TLHP</td>
                                            <td class="text"> {!! $data_rekomendasi->uraian_tlhp !!}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Status TLHP</td>
                                            @foreach ($data_status_tlhp as $item)
                                                <td class="text">
                                                    {{ $status_tlhp[$item->status_tlhp] ?? $item->status_tlhp }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('rekomendasi.index', $data_rekomendasi->id_temuan) }}"
                    class="btn btn-secondary">Kembali</a>
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
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: '200px'
            })
            $('#summernote1').summernote({
                height: '200px'
            })
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


    <script type="text/javascript">
        function confirmDelete() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

    {{-- Action Tambah Data --}}
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
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
