@extends('layouts.v1.app')
@section('title')
    Kode TLHP
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('pendaftaranobrik.store') }}">
                            @csrf
                            <div class="col-12 col-md-6">
                                <label class="form-label">Tahun</label>
                                <select class="form-select" name="tahun" id="tahun">
                                    <option value="">Semua Tahun</option>
                                    @for ($i = date('Y'); $i >= 1900; $i--)
                                        <option value="{{ $i }}" {{ $request->tahun == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Klarifikasi</label>
                                <select class="form-select" name="klarifikasi">
                                    @foreach ($klarifikasi_obriks as $klarifikasi)
                                        <option value="{{ $klarifikasi->id }}">{{ $klarifikasi->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Kode Obrik</label>
                                        <input type="text" name="kode" class="form-control" placeholder="Kode">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Induk Obrik</label>
                                        <input type="text" name="induk" class="form-control" placeholder="Induk">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nama Obrik</label>
                                <textarea class="form-control" name="nama" placeholder="Nama Obrik" rows="4" cols="4"></textarea>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary px-4">Save</button>
                                <a href="{{ route('pendaftaranobrik.index') }}" class="btn btn-info px-4">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
