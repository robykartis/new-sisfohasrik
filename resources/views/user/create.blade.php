@extends('layouts.app')
@section('title')
    Tambah Pengguna
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
@endpush
@section('content')
    <section class="content">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                                            <input type="text" value="{{ old('name') }}" name="name"
                                                class="form-control" placeholder="Masukan Nama">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" value="{{ old('email') }}" name="email"
                                                class="form-control" placeholder="Masukan Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                                <option selected disabled>Pilih Level</option>
                                                <option value="admin">Admin</option>
                                                <option value="operator">Operator</option>
                                                <option value="readonly">Read Only</option>
                                            </select>
                                            @error('level')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Nip</label>
                                            <input type="text" value="{{ old('nip') }}" name="nip"
                                                class="form-control" placeholder="Masukan Nip">
                                            @error('nip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>

        </form>
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Gambar</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <img class="img-fluid" src="{{ asset('backend/assets/media/various/ecom_product6.png') }}"
                            alt="">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
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
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            var name = $('input[name="name"]').val();
            var email = $('input[name="email"]').val();
            var level = $('selecl[name="level"]').val();
            var nip = $('input[name="nip"]').val();
            var image = $('input[name="image"]').val();
            var password = $('input[name="password"]').val();
            if (name == '') {
                toastr.error('User name harus di isi');
                $('input[name="name"]').focus();
                return;
            }
            if (email == '') {
                toastr.error('Email harus di isi');
                $('input[name="email"]').focus();
                return;
            }
            if ($('select[name="level"]')[0].selectedIndex == 0) {
                toastr.error('Level Akun harus di pilih');
                $('select[name="level"]').focus();
                return;
            }
            if (nip == '') {
                toastr.error('Nip harus di isi');
                $('input[name="nip"]').focus();
                return;
            }
            if (password == '') {
                toastr.error('Password harus di isi');
                $('input[name="password"]').focus();
                return;
            }
            if (image == '') {
                toastr.error('Silahkan Upload Foto');
                $('input[name="image"]').focus();
                return;
            }

            $(this).unbind('submit').submit();
        });
    </script>
@endpush
