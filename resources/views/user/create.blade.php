@extends('layouts.app')
@section('title')
    User Create
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
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-price">Nama</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-price">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukan Email">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-category">Level Akun</label>
                                    <select class="js-select2 form-select" name="level" style="width: 100%;"
                                        data-placeholder="Choose one..">
                                        <option selected disabled>Silahkan Pilih Level Account</option>
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                        <option value="readonly">Read Only</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="one-ecom-product-price">Nip</label>
                                    <input type="text" class="form-control" name="nip" placeholder="Masukan Nip">
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
                                <button type="submit" class="btn btn-alt-primary">Save</button>
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
                                                    src="{{ asset('backend/assets/media/various/ecom_product6.png') }}"
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
