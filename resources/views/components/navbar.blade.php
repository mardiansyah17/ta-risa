<div class="navbar bg-transparent absolute top-0 left-0 right-0 text-white">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">JAKABARING SPORT CITY</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            @if (auth()->check())
                <li><a>Lihat vanue</a></li>
                <li><a>Pemesanan</a></li>
                <li><a>Logout</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif

        </ul>
    </div>
</div>
