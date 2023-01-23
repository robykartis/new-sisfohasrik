@extends('layouts.app')
@section('title')
    Input Temuan Hasil Pemeriksaan
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
        <div class="card card-warning">
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
                    <form method="POST" action="{{ route('temuan.store') }}">
                        @csrf
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <input type="hidden" name="id_lhp" value="{{ $data->id }}" class="form-control"
                                    readonly>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">No Temuan</label>
                                        <input type="text" value="{{ old('no_temuan') }}" name="no_temuan"
                                            class="form-control" placeholder="Masukan No Temuan">
                                        @error('no_temuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputStatus">Bidang</label>
                                        <select id="inputStatus" name="bidang_temuan" class="form-control custom-select">
                                            <option selected disabled>Pilih Bidang</option>
                                            @foreach ($kod_bidang as $kd_bidang)
                                                <option value="{{ $kd_bidang->id }}">{{ $kd_bidang->kode }} -
                                                    {{ $kd_bidang->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('bidang_temuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                                <option value="{{ $kode_temuan->id }}">{{ $kode_temuan->kode }} -
                                                    {{ $kode_temuan->nama }}</option>
                                            @endforeach

                                        </select>
                                        @error('kode_temuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="one-ecom-product-price">Judul Temuan</label>
                                        <textarea name="judul_temuan" placeholder="Masukan Judul Temuan" class="form-control">{{ old('judul_temuan') }}</textarea>
                                        @error('judul_temuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                            {{ old('uraian_temuan') }}
                                      </textarea>
                                        @error('uraian_temuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Kerugian Negara</label>
                                        <input type="number" value="{{ old('jml_rnd_neg') }}" name="jml_rnd_neg"
                                            class="form-control" placeholder="Masukan Jumblah Kerugian Negara">
                                        @error('jml_rnd_neg')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Setor Negara</label>
                                        <input type="number" value="{{ old('jml_snd_neg') }}" name="jml_snd_neg"
                                            class="form-control" placeholder="Masukan Jumblah Setor Negara">
                                        @error('jml_snd_neg')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Kerugian Daerah</label>
                                        <input type="number" value="{{ old('jml_rnd_drh') }}" name="jml_rnd_drh"
                                            class="form-control" placeholder="Masukan Jumblah Kerugian Negara">
                                        @error('jml_rnd_drh')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Jumblah Setor Daerah</label>
                                        <input type="number" value="{{ old('jml_snd_drh') }}" name="jml_snd_drh"
                                            class="form-control" placeholder="Masukan Jumblah Setor Negara">
                                        @error('jml_snd_drh')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="one-ecom-product-price">Keterangan</label>
                                        <textarea name="keterangan" placeholder="Masukan Keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                                        @error('keterangan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table row -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('lhp.show', $id) }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
            <!-- /.card-footer-->
        </div>
        </form>
        <!-- /.card -->
    </section>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: '200px'
            })
        })
    </script>
    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            var noTemuan = $('input[name="no_temuan"]').val();
            var bidangTemuan = $('select[name="bidang_temuan"]').val();
            var jml_rnd_neg = $('input[name="jml_rnd_neg"]').val();
            var jml_snd_neg = $('input[name="jml_snd_neg"]').val();
            var jml_rnd_drh = $('input[name="jml_rnd_drh"]').val();
            var jml_snd_drh = $('input[name="jml_snd_drh"]').val();
            var judulTemuan = $('textarea[name="judul_temuan"]').val();
            var keterangan = $('textarea[name="keterangan"]').val();
            var uraianTemuan = $('textarea[name="uraian_temuan"]').val();
            var kodeTemuan = $('select[name="kode_temuan"]').val();
            if (noTemuan == '') {
                toastr.error('No Temuan harus diisi');
                $('input[name="no_temuan"]').focus();
                return;
            }
            if ($('select[name="bidang_temuan"]')[0].selectedIndex == 0) {
                toastr.error('Bidang Temuan harus diisi');
                $('select[name="bidang_temuan"]').focus();
                return;
            }
            if ($('select[name="kode_temuan"]')[0].selectedIndex == 0) {
                toastr.error('Kode Temuan harus diisi');
                $('select[name="kode_temuan"]').focus();
                return;
            }
            if (judulTemuan == '') {
                toastr.error('Judul Temuan harus diisi');
                $('textarea[name="judul_temuan"]').focus();
                return;
            }
            if (uraianTemuan == '') {
                toastr.error('Uraian Temuan harus diisi');
                $('textarea[name="uraian_temuan"]').focus();
                return;
            }
            if (jml_rnd_neg == '') {
                toastr.error('Jumlah Kerugian Negara  harus diisi');
                $('input[name="jml_rnd_neg"]').focus();
                return;
            }
            if (jml_snd_neg == '') {
                toastr.error('Jumlah Setor Negara harus diisi');
                $('input[name="jml_snd_neg"]').focus();
                return;
            }
            if (jml_rnd_drh == '') {
                toastr.error('Jumlah Kerugian Daerah harus diisi');
                $('input[name="jml_rnd_drh"]').focus();
                return;
            }
            if (jml_snd_drh == '') {
                toastr.error('Jumlah Setor Daerah harus diisi');
                $('input[name="jml_snd_drh"]').focus();
                return;
            }
            if (keterangan == '') {
                toastr.error('Keterangan harus diisi');
                $('textarea[name="keterangan"]').focus();
                return;
            }
            $(this).unbind('submit').submit();
        });
    </script>
@endpush
