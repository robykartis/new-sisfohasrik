<div class="content-header">
    <!-- Left Section -->
    <div class="d-flex align-items-center">
        <!-- Toggle Sidebar -->
        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
            data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
        </button>
        <!-- END Toggle Sidebar -->
        <!-- Toggle Mini Sidebar -->
        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout"
            data-action="sidebar_mini_toggle">
            <i class="fa fa-fw fa-ellipsis-v"></i>
        </button>
        <!-- END Toggle Mini Sidebar -->
    </div>
    <!-- END Left Section -->
    <!-- Right Section -->
    <div class="d-flex align-items-center">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                @if (Auth::user()->level == 'admin')
                    <img class="rounded-circle" src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                        alt="Header Avatar" style="width: 21px;">
                @elseif (Auth::user()->level == 'operator')
                    <img class="rounded-circle" src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                        alt="Header Avatar" style="width: 21px;">
                @else
                    <img class="rounded-circle" src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}"
                        alt="Header Avatar" style="width: 21px;">
                @endif

                <span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->name }}</span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                    @if (Auth::user()->level == 'admin')
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}" alt="">
                    @elseif (Auth::user()->level == 'operator')
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}" alt="">
                    @else
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ asset('images/akun/smal/small_' . Auth::user()->image) }}" alt="">
                    @endif
                    <p class="mt-2 mb-0 fw-medium">{{ Auth::user()->name }}</p>
                    <p class="mb-0 text-muted fs-sm fw-medium">{{ Auth::user()->email }}</p>
                </div>
                <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="be_pages_generic_inbox.html">
                        <span class="fs-sm fw-medium">Level</span>
                        <span class="badge rounded-pill bg-primary ms-2">{{ Auth::user()->level }}</span>
                    </a>

                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">

                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="{{ route('logout') }}">
                        <span class="fs-sm fw-medium">Log Out</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- END User Dropdown -->
    </div>
    <!-- END Right Section -->
</div>
