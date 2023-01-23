@extends('layouts.app')
@section('title')
    Datail Temuan
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
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
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{ $title_lhp }}

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
                                {{ $title_temuan }}
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
                                            <td class="item">Uraian Temuan</td>
                                            <td class="text"> {!! $temuan->urian_temuan !!}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Bidang</td>
                                            <td class="text"> {{ $kode->bidang }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Jumlah Kerugian Negara</td>
                                            <td class="text"> {{ $temuan->jml_rnd_neg }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Jumlah Setor Negara</td>
                                            <td class="text"> {{ $temuan->jml_snd_neg }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Jumlah Kerugian Daerah</td>
                                            <td class="text">{{ $temuan->jml_rnd_drh }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Jumlah Setor Daerah</td>
                                            <td class="text"> {{ $temuan->jml_snd_drh }}</td>
                                        </tr>
                                        <tr>
                                            <td class="item">Keterangan</td>
                                            <td class="text"> {{ $temuan->keterangan }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-body pt-0 mt-4">
                                <div class="row">
                                    <div class="mx-auto">
                                        <a href="{{ route('penyebab.index', $temuan->id) }}" class="btn btn-success btn-sm"
                                            title="Penyebab">
                                            Penyebab
                                        </a>
                                        <a href="{{ route('rekomendasi.index', $temuan->id) }}"
                                            class="btn btn-success btn-sm" title="Add">
                                            Rekomendasi
                                        </a>
                                        <a href="{{ route('tindaklanjut.index', $temuan->id) }}"
                                            class="btn btn-success btn-sm" title="Add">
                                            Tindak Lanjut
                                        </a>
                                        <a href="{{ route('penarikanrnd.index', $temuan->id) }}"
                                            class="btn btn-success btn-sm" title="Add">
                                            Penarikan RND
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('lhp.show', $data->id) }}" class="btn btn-secondary">Kembali</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </section>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
            $('#summernote1').summernote()
        })
    </script>
@endpush
