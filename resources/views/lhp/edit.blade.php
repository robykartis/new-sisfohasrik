@extends('layouts.app')
@section('title')
    Edit Laporan Hasil Pemeriksaan (LHP)
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('lhp.update', $data->id) }}">
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
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus">Tahun</label>
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
                                                @foreach ($klarifikasi_obrik as $klarifikasi)
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
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">No LHP</label>
                                            <input type="text" value="{{ $data->no_lhp }}" name="no_lhp"
                                                class="form-control" placeholder="Masukan No LHP">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Obrik</label>
                                            <select class="form-control custom-select" name="obrik">
                                                @foreach ($dataobrik as $dobrik)
                                                    <option value="{{ $dobrik->id }}"
                                                        {{ $dobrik->id == $data->dobrik ? 'selected' : '' }}>
                                                        {{ $dobrik->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="one-ecom-product-price">Tanggal Obrik</label>
                                            <input type="text" value="{{ $tgl_lhp }}" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus"><span class="text-danger"><small>
                                                        Rubah
                                                        Tahun Jika Diperlukan</small></span></label>
                                            <input type="date" value="{{ date('Y-m-d', strtotime($data->tgl_lhp)) }}"
                                                name="tgl_lhp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('lhp.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-success float-right">Perbaharui</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
@endsection
