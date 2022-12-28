@extends('layouts.app')
@section('title')
    User Show
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
            <div class="row justify-content-center">

                <!-- left column -->
                <div class="col-md-6 mt-3">

                    <!-- About Me Box -->

                    <div class="card card-warning card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                                <img class="profile-user-img img-fluid img-circle"
                                    src="/images/akun/thumbnail/{{ $user->image }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{ $user->nip }}</p>
                            <p class="text-muted text-center">{{ $user->email }}</p>
                            <p class="text-muted text-center">{{ $user->level }}</p>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                            <a href="{{ route('users.index') }}" class="btn btn-info btn-block"><b>Back</b></a>
                        </div>
                    </div>

                    <!-- /.card -->
                </div>
            </div>

        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>

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
@endpush
