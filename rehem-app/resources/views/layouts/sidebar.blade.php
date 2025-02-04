<header class="sidebar">
    <ul class="nav">
        <li class="{{ Route::currentRouteName() === 'top' ? 'active' : ''}} home navItem"><a href="{{ route('top') }}"></a></li>
        <div class="divider"></div>
        <li class="{{ Route::currentRouteName() === 'record' ? 'active' : ''}} addRecord navItem"><a href="{{ route('record') }}"></a></li>
        <div class="divider"></div>
        <li class="{{ Route::currentRouteName() === 'profile' ? 'active' : ''}} profile navItem"><a href="{{ route('profile') }}"></a></li>
    </ul>
</header>