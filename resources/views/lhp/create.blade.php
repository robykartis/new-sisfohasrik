@extends('layouts.app')
@section('title')
    Create Hasil Pemeriksaan (LHP)
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('lhp.store') }}">
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
                                            <label for="inputStatus">Klarifikasi Obrik</label>
                                            <select id="inputStatus" name="klarifikasi" class="form-control custom-select">
                                                <option selected disabled>Pilih Klarifikasi</option>
                                                @foreach ($klarifikasi_obrik as $klarifikasi)
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
                                            <label for="inputName">No LHP</label>
                                            <input type="text" name="no_lhp" class="form-control"
                                                placeholder="Masukan No LHP">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Nama Obrik</label>
                                            <select class="form-control custom-select" name="obrik">
                                                <option value="">Semua Obrik</option>
                                                @foreach ($dataobrik as $dobrik)
                                                    <option value="{{ $dobrik->id }}">{{ $dobrik->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="one-ecom-product-price">Tanggal LHP</label>
                                            <input type="date" name="tgl_lhp" class="form-control">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-4">
                                    <a href="{{ route('lhp.index') }}" class="btn btn-secondary">Cancel</a>
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
