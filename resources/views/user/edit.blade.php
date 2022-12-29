@extends('layouts.app')
@section('title')
    User Edit
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- left column -->
                <div class="col-md-6">
                    <!-- jquery validation -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}" name="name" class="form-control">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                        value="{{ old('name', $user->email) }}" name="email" class="form-control">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nip <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control  @error('nip') is-invalid @enderror"
                                        value="{{ old('nip', $user->nip) }}" name="nip" class="form-control">

                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                id="exampleInputFile">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Level <span class="text-danger">*</span></label>
                                    <select class="custom-select  @error('level') is-invalid @enderror"" name="level"
                                        required>
                                        @foreach ($data as $key => $val)
                                            @if ($key == old('level', $user->level))
                                                <option selected value="{{ $key }}">{{ $val }}</option>
                                            @endif
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>

                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                <a href="{{ route('users.index') }}" type="submit" class="btn btn-info btn-sm">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>


                <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Images</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="img-fluid pad" src="{{ asset('images/akun/smal/small_' . $user->image) }}"
                                alt="Photo">
                        </div>
                    </div>
                </div>

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
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
