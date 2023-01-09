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
                        <form class="row g-3" method="POST" action="{{ route('lhp.store') }}">
                            @csrf
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label class="form-label">Tahun</label>
                                        <div class="input-group">
                                            <select class="form-select" name="tahun" id="tahun">
                                                <option value="">Semua Tahun</option>
                                                @for ($i = date('Y'); $i >= 1900; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $request->tahun == $i ? 'selected' : '' }}>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="form-label">Klarifikasi Obrik</label>
                                        <div class="input-group">
                                            <select class="form-select" name="klarifikasi">
                                                <option value="">Semua Klarifikasi Obrik</option>
                                                @foreach ($klarifikasi_obrik as $klarifikasi)
                                                    <option value="{{ $klarifikasi->id }}">{{ $klarifikasi->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">No LHP</label>
                                <input type="text" name="no_lhp" class="form-control" placeholder="No LHP">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nama Obrik</label>
                                <div class="input-group">
                                    <select class="form-select" name="obrik">
                                        <option value="">Semua Obrik</option>
                                        @foreach ($dataobrik as $dobrik)
                                            <option value="{{ $dobrik->id }}">{{ $dobrik->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tanggal LHP</label>
                                <input type="date" class="form-control" id="tgl_lhp" name="tgl_lhp" required>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-4">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection
