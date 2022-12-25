<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Akses | {{ Auth::user()->level }}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            {{-- <a class="nav-link btn btn-warning" role="button" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a> --}}
            <a class="nav-link btn btn-warning" role="button" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form> --}}
        </li>
    </ul>
</nav>
