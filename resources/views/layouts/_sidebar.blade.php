@if (Auth::user()->level == 'admin')
    @include('layouts.com_sidebar.admin')
@elseif(Auth::user()->level == 'operator')
    @include('layouts.com_sidebar.operator')
@else
    @include('layouts.com_sidebar.readonly')
@endif
