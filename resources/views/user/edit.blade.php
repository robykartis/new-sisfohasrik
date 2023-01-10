@extends('layouts.app')
@section('title')
    User Edit
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/plugins/dropzone/min/dropzone.min.css') }}">
@endpush
@section('content')
    <div class="content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Info</h3>
            </div>
            <div class="block-content">
                <form class="row g-3" action="{{ route('users.update', $user) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-price">Nama</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $user->name) }}" placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-price">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('name', $user->email) }}" placeholder="Masukan Email">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-category">Level Akun</label>
                                    <select class="js-select2 form-select" name="level" style="width: 100%;"
                                        data-placeholder="Choose one..">
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
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-price">Nip</label>
                                    <input type="text" class="form-control" name="nip"
                                        value="{{ old('name', $user->nip) }}" placeholder="Masukan Nip">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-stock">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Masukan Password">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-stock">Gambar</label>
                                    <input class="form-control" name="image" value="{{ old('image') }}" type="file">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                                <a href="{{ route('users.index') }}" class="btn btn-alt-info">Cancel</a>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-4">
                            <div class="block-content block-content-full">
                                <div class="row justify-content-center">
                                    <div class="row g-sm js-gallery img-fluid-100">
                                        <div class="col-12 mb-3">
                                            <div class="">
                                                <img class="img-fluid"
                                                    src="{{ asset('images/akun/smal/small_' . $user->image) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- END Info -->

    </div>







    {{-- <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">{{ $title }}</h5>
                    </div>
                </div>
                <form class="row g-3" action="{{ route('users.update', $user) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="col-12">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                                class="form-control" placeholder="Name">
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email"
                                                value="{{ old('email', $user->email) }}" class="form-control"
                                                placeholder="Email">
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <label class="form-label">Nip</label>
                                            <input type="number" name="nip" value="{{ old('nip', $user->nip) }}"
                                                class="form-control" placeholder="Nip">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Images</label>
                                                <input class="form-control" name="image" value="{{ old('image') }}"
                                                    type="file">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" name="level">
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
                                        <!--end row-->
                                    </div>
                                </div>
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12 text-center">
                                                <img src="{{ asset('images/akun/smal/small_' . $user->image) }}"
                                                    class="rounded shadow" width="120" height="120" alt="">
                                            </div>

                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    <a href="{{ route('users.index') }}" type="submit"
                                        class="btn btn-info btn-sm">Cancel</a>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection

@push('js')
    <!-- jQuery (required for Select2 + Bootstrap Maxlength plugin) -->
    <script src="{{ asset('backend/assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('backend/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropzone/min/dropzone.min.js') }}"></script>
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
@endpush
