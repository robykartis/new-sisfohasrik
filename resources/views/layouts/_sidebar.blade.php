<aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <div class="container">
        <a href="#" class="brand-link">
            <img src="{{ asset('assets/logo/logosiap.png') }}" height="40px" alt="User Image">
            {{-- <img src="{{ asset('assets/logo/logosiap.ico') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8"> --}}
            <span class="brand-text font-weight-light"><b>
                    {{ config('app.name') }}
                </b></span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->level == 'admin')
                    @include('layouts.com_sidebar.admin')
                @elseif(Auth::user()->level == 'operator')
                    @include('layouts.com_sidebar.operator')
                @else
                    @include('layouts.com_sidebar.readonly')
            </ul>

        </nav>
        @endif
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
