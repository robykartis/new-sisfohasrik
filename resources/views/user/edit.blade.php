@extends('layouts.v1.app')
@section('title')
    User Edit
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">{{ $title }}</h5>
                    </div>
                </div>
                <form class="row g-3" action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
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
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                                class="form-control" placeholder="Email">
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
                                                            <option selected value="{{ $key }}">{{ $val }}
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
    </div>
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
@endpush
