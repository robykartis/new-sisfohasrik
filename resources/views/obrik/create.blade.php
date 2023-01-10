@extends('layouts.app')
@section('title')
    Kode TLHP
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
@endpush
@section('content')
    <div class="content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $title }}</h3>
            </div>
            <div class="block-content">
                <form method="POST" action="{{ route('pendaftaranobrik.store') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-category">Tahun</label>

                                    <select class="form-select" name="tahun" id="tahun">
                                        <option value="">Semua Tahun</option>
                                        @for ($i = date('Y'); $i >= 1900; $i--)
                                            <option value="{{ $i }}"
                                                {{ $request->tahun == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-category">Klarifikasi</label>
                                    <select class="form-select" name="klarifikasi">
                                        <option value="">Semua Klarifikasi</option>
                                        @foreach ($klarifikasi_obriks as $klarifikasi)
                                            <option value="{{ $klarifikasi->id }}">{{ $klarifikasi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-stock">Kode Obrik</label>
                                    <input type="text" name="kode" class="form-control" placeholder="Kode">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-stock">Induk Obrik</label>
                                    <input type="text" name="induk" class="form-control" placeholder="Induk">
                                </div>
                            </div>
                            <div class="row mb-12">
                                <div class="col-md-12">
                                    <label class="form-label" for="one-ecom-product-price">Nama Obrik</label>
                                    <textarea class="form-control" name="nama" placeholder="Nama Obrik" rows="4" cols="4"></textarea>
                                </div>
                            </div>
                            <div class="mb-4 mt-4">
                                <button class="btn btn-alt-primary">Save</button>
                                <a href="{{ route('pendaftaranobrik.index') }}" class="btn btn-alt-info">Cancel</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- END Info -->
    </div>
@endsection

@push('js')
    <!-- jQuery (required for Select2 + Bootstrap Maxlength plugin) -->
    <script src="{{ asset('backend/assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('backend/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
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
