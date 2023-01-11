@extends('layouts.app')
@section('title')
    Edit Obrik
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <div class="content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $title }}</h3>
            </div>
            <div class="block-content">
                <form class="row g-3" method="POST" action="{{ route('pendaftaranobrik.update', $data->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label class="form-label" for="one-ecom-product-stock">Tahun</label>
                                    <input type="text" disabled class="form-control" value="{{ $data->tahun }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"><span class="text-danger"><small>
                                                Rubah
                                                Tahun Jika Diperlukan</small></span></label>
                                    <select class="form-select" name="tahun" id="tahun">
                                        <option value="">Semua Tahun</option>
                                        @for ($i = date('Y'); $i >= 1900; $i--)
                                            <option value="{{ $i }}" {{ $data->tahun == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-category">Klarifikasi</label>
                                    <select class="form-select" name="klarifikasi">
                                        @foreach ($klarifikasi_obriks as $klarifikasi)
                                            <option value="{{ $klarifikasi->id }}"
                                                {{ $klarifikasi->id == $data->klarifikasi ? 'selected' : '' }}>
                                                {{ $klarifikasi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-stock">Kode Obrik</label>
                                    <input type="text" name="kode" value="{{ $data->kode }}" class="form-control"
                                        placeholder="Kode">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-stock">Induk Obrik</label>
                                    <input type="text" name="induk" value="{{ $data->induk }} " class="form-control"
                                        placeholder="Induk">
                                </div>
                            </div>
                            <div class="row mb-12">
                                <div class="col-md-12">
                                    <label class="form-label" for="one-ecom-product-price">Nama Obrik</label>
                                    <textarea class="form-control" name="nama" placeholder="Nama Obrik" rows="4" cols="4">{{ $data->nama }}</textarea>
                                </div>
                            </div>
                            <div class="mb-4 mt-4">
                                <button class="btn btn-alt-primary">Update</button>
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
