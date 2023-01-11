@extends('layouts.app')
@section('title')
    Edit Obrik
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('pendaftaranobrik.update', $data->id) }}">
            @csrf
            @method('PATCH')
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
                                            <label for="inputName">Tahun</label>
                                            <input type="text" value="{{ $data->tahun }}" disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus"><span class="text-danger"><small>
                                                        Rubah
                                                        Tahun Jika Diperlukan</small></span></label>
                                            <select id="inputStatus" name="tahun" class="form-control custom-select">
                                                <option selected value="{{ $data->tahun }}">{{ $data->tahun }}</option>
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
                                                @foreach ($klarifikasi_obriks as $klarifikasi)
                                                    <option value="{{ $klarifikasi->id }}"
                                                        {{ $klarifikasi->id == $data->klarifikasi ? 'selected' : '' }}>
                                                        {{ $klarifikasi->nama }}
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
                                            <input type="text" value="{{ $data->kode }}" name="kode"
                                                class="form-control" placeholder="Masukan Kode Obrik">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Induk Obrik</label>
                                            <input type="text" value="{{ $data->induk }}" name="induk"
                                                class="form-control" placeholder="Masukan Induk Obrik">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="one-ecom-product-price">Nama Obrik</label>
                                            <textarea class="form-control" name="nama" placeholder="Nama Obrik" rows="4" cols="4">{{ $data->nama }}</textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-4">
                                    <a href="{{ route('pendaftaranobrik.index') }}" class="btn btn-secondary">Cancel</a>
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




    {{-- <div class="content">
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
                                            <option value="{{ $i }}"
                                                {{ $data->tahun == $i ? 'selected' : '' }}>
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
                                    <input type="text" name="kode" value="{{ $data->kode }}"
                                        class="form-control" placeholder="Kode">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-stock">Induk Obrik</label>
                                    <input type="text" name="induk" value="{{ $data->induk }} "
                                        class="form-control" placeholder="Induk">
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
    </div> --}}
@endsection
