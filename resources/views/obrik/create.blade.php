@extends('layouts.app')
@section('title')
    Kode TLHP
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('pendaftaranobrik.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus">Tahun</label>
                                            <select id="inputStatus" name="tahun" class="form-control custom-select">
                                                <option value="">Semua Tahun</option>
                                                @for ($i = date('Y'); $i >= 1900; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $request->tahun == $i ? 'selected' : '' }}>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus">Klarifikasi</label>
                                            <select id="inputStatus" name="klarifikasi" class="form-control custom-select">
                                                <option selected disabled>Pilih Klarifikasi</option>
                                                @foreach ($klarifikasi_obriks as $klarifikasi)
                                                    <option value="{{ $klarifikasi->id }}">{{ $klarifikasi->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-8">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Kode Obrik</label>
                                            <input type="text" name="kode" class="form-control"
                                                placeholder="Masukan Kode Obrik">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Induk Obrik</label>
                                            <input type="text" name="induk" class="form-control"
                                                placeholder="Masukan Induk Obrik">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="one-ecom-product-price">Nama Obrik</label>
                                            <textarea class="form-control" name="nama" placeholder="Nama Obrik" rows="4" cols="4"></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-4">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-success float-right">Save</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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
@endpush
