@extends('layouts.app')
@section('title')
    Edit Rekomendasi
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
                </div>
                <form method="POST" action="{{ route('rekomendasi.update', $data_rekomendasi->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12">
                            <div class="col-md-12 col-lg-12">
                                <div class="row mb-2">
                                    <input type="hidden" name="id_temuan" value="{{ $data_rekomendasi->id_temuan }}"
                                        class="form-control" readonly>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputName">No Rekomendasi</label>
                                            <input type="text" value="{{ $data_rekomendasi->no_rekomendasi }}"
                                                name="no_rekomendasi" class="form-control"
                                                placeholder="Masukan No Penyebab">
                                            @error('no_rekomendasi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputStatus">Kode Rekomendasi</label>
                                            <select name="kode_rekomendasi" class="form-control custom-select">
                                                <option selected disabled>Pilih Kode Rekomendasi</option>
                                                @foreach ($kod_rekomendasi as $kode)
                                                    <option value="{{ $kode->id }}"
                                                        {{ $kode->id == $data_rekomendasi->kode_rekomendasi ? 'selected' : '' }}>
                                                        {{ $kode->kode }} - {{ $kode->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_rekomendasi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label " for="one-ecom-product-price">Uraian
                                                Rekomendasi</label>
                                            <textarea id="summernote" class="form-control" name="uraian_rekomendasi">{{ $data_rekomendasi->uraian_rekomendasi }}</textarea>
                                            @error('uraian_rekomendasi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="col-md-12 col-lg-12">
                                <div class="row mb-2">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="inputName">Tanggal TLHP</label>
                                            <input type="text" name="tgl_tlhp" value="{{ $data_tgl_tlhp }}" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="inputStatus"><span class="text-danger"><small>
                                                        Tanggal TLHP </small></span></label>
                                            <input type="date"
                                                value="{{ date('Y-m-d', strtotime($data_rekomendasi->tgl_tlhp)) }}"
                                                name="tgl_tlhp" class="form-control">
                                            @error('tgl_tlhp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inputStatus">Status TLHP</label>
                                            <select name="status_tlhp" class="form-control custom-select">
                                                @foreach ($status_tlhp as $key => $value)
                                                    @if (in_array($key, ['S', 'B', 'D']))
                                                        <option value="{{ $key }}"
                                                            {{ old('status_tlhp', $data_rekomendasi->status_tlhp) == $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('status_tlhp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="inputStatus">Kode TLHP</label>
                                            <select name="kode_tlhp" class="form-control custom-select">

                                                <option selected disabled>Pilih Kode Rekomendasi</option>
                                                @foreach ($kod_tlhp as $kode)
                                                    <option value="{{ $kode->id }}"
                                                        {{ $kode->id == $data_rekomendasi->kode_tlhp ? 'selected' : '' }}>
                                                        {{ $kode->kode }} - {{ $kode->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_tlhp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label " for="one-ecom-product-price">Uraian TLHP</label>
                                            <textarea id="summernote1" class="form-control" name="uraian_tlhp">{{ $data_rekomendasi->uraian_tlhp }}</textarea>
                                            @error('uraian_tlhp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('rekomendasi.index', $data_rekomendasi->id_temuan) }}"
                    class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success float-right">Update</button>
            </div>
            </form>
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
    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            var no_rekomendasi = $('input[name="no_rekomendasi"]').val();
            var kode_rekomendasi = $('seleclt[name="kode_rekomendasi"]').val();
            var uraian_rekomendasi = $('textarea[name="uraian_rekomendasi"]').val();
            var tgl_tlhp = $('input[name="tgl_tlhp"]').val();
            var kode_tlhp = $('select[name="kode_tlhp"]').val();
            var uraian_tlhp = $('textarea[name="uraian_tlhp"]').val();
            if (no_rekomendasi == '') {
                toastr.error('No rekomendasi name harus di isi');
                $('input[name="no_rekomendasi"]').focus();
                return;
            }
            if ($('select[name="kode_rekomendasi"]')[0].selectedIndex == 0) {
                toastr.error('Kode rekomendasi harus dipilih');
                $('select[name="kode_rekomendasi"]').focus();
                return;
            }
            if (uraian_rekomendasi == '') {
                toastr.error('Uraian rekomendasi harus diisi');
                $('textarea[name="uraian_rekomendasi"]').focus();
                return;
            }
            if (tgl_tlhp == '') {
                toastr.error('Tanggal tlhp harus di isi');
                $('input[name="tgl_tlhp"]').focus();
                return;
            }

            if ($('select[name="kode_tlhp"]')[0].selectedIndex == 0) {
                toastr.error('Kode TLHP harus dipilih');
                $('select[name="kode_tlhp"]').focus();
                return;
            }
            if (uraian_tlhp == '') {
                toastr.error('Uraian TLHP harus diisi');
                $('textarea[name="uraian_tlhp"]').focus();
                return;
            }
            $(this).unbind('submit').submit();
        });
    </script>
@endpush
