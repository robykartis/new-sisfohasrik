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
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-tools">

                </div>
            </div>
            <form method="POST" action="{{ route('penyebabtemuan.update', $penyebab->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    ID = {{ $lhp_detail->id }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="container">
                                            <tr>
                                                <td class="item">Tahun</td>
                                                <td class="text"> {{ $lhp_detail->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Klarifikasi Obrik</td>
                                                <td class="text"> {{ $lhp_detail->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">No LHP</td>
                                                <td class="text"> {{ $lhp_detail->no_lhp }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Nama Obrik</td>
                                                <td class="text"> {{ $lhp_detail->nama_obrik }}</td>
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
                                    ID = {{ $sebab->id }}
                                </div>
                                <input type="hidden" name="id_temuan" value="{{ $sebab->id }}" class="form-control"
                                    readonly>
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="container">
                                            <tr>
                                                <td class="item">No Temuan</td>
                                                <td class="text"> {{ $temuan_detail->no_temuan }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Judul Temuan</td>
                                                <td class="text"> {{ $temuan_detail->judul_temuan }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Kode Temuan</td>
                                                <td class="text"> {{ $temuan_detail->kode_temuan }}</td>
                                            </tr>
                                            <tr>
                                                <td class="item">Bidang</td>
                                                <td class="text"> {{ $temuan_detail->kode_bidang }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    ID = {{ $penyebab->id }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="row mb-2">
                                                    <input type="text" name="id" value="{{ $penyebab->id }}"
                                                        class="form-control" readonly>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputName">No Penyebab</label>
                                                            <input type="text" value="{{ $sebab->no_sebab }}"
                                                                name="no_sebab" class="form-control"
                                                                placeholder="Masukan No Penyebab">
                                                            @error('no_sebab')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputStatus">Kode Penyebab</label>
                                                            <select id="inputStatus" name="kode_sebab"
                                                                class="form-control custom-select">
                                                                <option selected disabled>Pilih Kode Penyebab</option>
                                                                @foreach ($kode_sebab as $kode)
                                                                    <option value="{{ $kode->id }}"
                                                                        {{ $kode->id == $sebab->kode_sebab ? 'selected' : '' }}>
                                                                        {{ $kode->kode }} - {{ $kode->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('kode_sebab')
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
                                                                Penyebab</label>
                                                            <textarea id="summernote" class="form-control" name="uraian_sebab">{{ $sebab->uraian_sebab }}</textarea>
                                                            @error('uraian_sebab')
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
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->


                <div class="card-footer">
                    <a href="{{ route('penyebab.index', $sebab->id_temuan) }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success float-right">Simpan</button>
                </div>
            </form>
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
                height: '400px'
            })
            $('#summernote1').summernote()
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


    <script type="text/javascript">
        function confirmDelete() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
