@extends('layouts.app')
@section('title')
    Tambah Temuan
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                {{-- <i class="fas fa-globe"></i> {{ $title }} --}}
                                <small class="float-right">Date: {{ $tgl_lhp }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Tahun
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $data->tahun }} </strong><br>
                                <strong>No LHP
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $data->no_lhp }} </strong><br>
                                <strong>Nama Obrik
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $data->nama_obrik }} </strong><br>
                                <strong>Klarifikasi Obrik &nbsp;&nbsp;:
                                    {{ $data->nama }}
                                </strong><br>
                            </address>
                        </div>
                    </div>
                    <hr>

                    <!-- /.row -->
                    <form method="POST" action="{{ route('temuan.update', $temuan->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <input type="hidden" name="id_lhp" value="{{ $data->id }}" class="form-control"
                                    readonly>
                                <input type="hidden" name="id" value="{{ $temuan->id }}" class="form-control"
                                    readonly>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">No Temuan</label>
                                        <input type="text" value="{{ $temuan->no_temuan }}" name="no_temuan"
                                            class="form-control" placeholder="Masukan No Temuan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputStatus">Bidang</label>
                                        <select id="inputStatus" name="bidang_temuan" class="form-control custom-select">
                                            <option selected disabled>Pilih Bidang</option>
                                            @foreach ($kod_bidang as $kd_bidang)
                                                <option value="{{ $kd_bidang->id }}"
                                                    {{ $kd_bidang->id == $temuan->kode_temuan ? 'selected' : '' }}>
                                                    {{ $kd_bidang->kode }} -
                                                    {{ $kd_bidang->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputStatus">Kode Temuan</label>
                                        <select id="inputStatus" name="kode_temuan" class="form-control custom-select">
                                            <option selected disabled>Pilih Kode Temuan</option>
                                            @foreach ($kod_temuan as $kode_temuan)
                                                <option value="{{ $kode_temuan->id }}"
                                                    {{ $kode_temuan->id == $temuan->bidang_temuan ? 'selected' : '' }}>
                                                    {{ $kode_temuan->kode }} -
                                                    {{ $kode_temuan->nama }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="one-ecom-product-price">Judul Temuan</label>
                                        <textarea name="judul_temuan" required="" placeholder="Masukan Judul Temuan" class="form-control">{{ $temuan->judul_temuan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="one-ecom-product-price">Uraian Temuan</label>
                                        <textarea id="summernote" name="uraian_temuan">
                                            {{ $temuan->urian_temuan }}
                                      </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Kerugian Negara</label>
                                        <input type="number" value="{{ $temuan->jml_rnd_neg }}" name="jml_rnd_neg"
                                            class="form-control" placeholder="Masukan Jumblah Kerugian Negara">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Setor Negara</label>
                                        <input type="number" value="{{ $temuan->jml_snd_neg }}" name="jml_snd_neg"
                                            class="form-control" placeholder="Masukan Jumblah Setor Negara">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Kerugian Daerah</label>
                                        <input type="number" value="{{ $temuan->jml_rnd_drh }}" name="jml_rnd_drh"
                                            class="form-control" placeholder="Masukan Jumblah Kerugian Negara">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Setor Daerah</label>
                                        <input type="number" value="{{ $temuan->jml_snd_neg }}" name="jml_snd_drh"
                                            class="form-control" placeholder="Masukan Jumblah Setor Negara">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="one-ecom-product-price">Keterangan</label>
                                        <textarea name="keterangan" required="" placeholder="Masukan Keterangan" class="form-control"> {{ $temuan->keterangan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table row -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('lhp.show', $data->id) }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success float-right">Update</button>
            </div>
            <!-- /.card-footer-->
        </div>
        </form>
        <!-- /.card -->
    </section>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: '200px'
            })

        })
    </script>
@endpush
