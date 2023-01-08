<header class="top-header">
    <nav class="navbar navbar-expand gap-3 align-items-center">
        <div class="mobile-toggle-icon fs-3">
            <i class="bi bi-list"></i>
        </div>
        <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                        <div class="user-setting d-flex align-items-center">
                            @if (Auth::user()->level == 'admin')
                                <img src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                                    class="user-img">
                            @elseif (Auth::user()->level == 'operator')
                                <img src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                                    class="user-img">
                            @else
                                <img src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                                    class="user-img">
                            @endif

                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    @if (Auth::user()->level == 'admin')
                                        <img src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                                            alt="" class="rounded-circle" width="54" height="54">
                                    @elseif (Auth::user()->level == 'operator')
                                        <img src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                                            alt="" class="rounded-circle" width="54" height="54">
                                    @else
                                        <img src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                                            alt="" class="rounded-circle" width="54" height="54">
                                    @endif



                                    <div class="ms-3">
                                        <h4 class="mb-0 dropdown-user-name">{{ Auth::user()->name }}</h4>
                                        <h6>level
                                            <small
                                                class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->level }}</small>
                                        </h6>

                                        <h6>
                                            Email
                                            <small
                                                class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->email }}</small>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                    <div class="ms-3"><span>Logout</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
