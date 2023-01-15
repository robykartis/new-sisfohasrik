@extends('layouts.app')
@section('title')
    Edit Pengguna
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@section('content')
    <section class="content">
        <form class="form-horizontal" action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-8">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" value="{{ old('name', $user->name) }}" name="name"
                                                class="form-control" placeholder="Masukan Nama">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" value="{{ old('name', $user->email) }}" name="email"
                                                class="form-control" placeholder="Masukan Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus">Level</label>
                                            <select id="inputStatus" name="level" class="form-control custom-select">
                                                @foreach ($data as $key => $val)
                                                    @if ($key == old('level', $user->level))
                                                        <option selected value="{{ $key }}">
                                                            {{ $val }}
                                                        </option>
                                                    @endif
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Nip</label>
                                            <input type="text" value="{{ old('name', $user->nip) }}" name="nip"
                                                class="form-control" placeholder="Masukan Nip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-12">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Masukan Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Gambar</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('users.index') }}" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-success float-right">Perbaharui</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Gambar</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-10 col-lg-12">
                                <div class="form-group">
                                    <img class="img-fluid" src="{{ asset('images/akun/' . $user->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>


            </div>
        </form>
    </section>
@endsection
