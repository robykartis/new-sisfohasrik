@extends('layouts.v1.app')
@section('title')
    Detail Pengguna
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="{{ asset('images/akun/smal/small_' . $user->image) }}" class="rounded-circle shadow"
                            width="120" height="120" alt="">
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">{{ $user->name }}</h4>
                        <p class="mb-0 text-secondary">{{ $user->email }}</p>
                        <div class="mt-4"></div>

                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3">

                        <div class="text-center">
                            <h4 class="mb-0">Level</h4>
                            <p class="mb-0 text-secondary">{{ $user->level }}</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">Nip</h4>
                            <p class="mb-0 text-secondary">{{ $user->nip }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                        <div class="text-center">
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
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
@endpush
