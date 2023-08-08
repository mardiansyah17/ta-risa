<div class="navbar  absolute top-0 left-0 right-0 ">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">JAKABARING SPORT CITY</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            @if (auth()->check())
                @if(auth()->user()->role == 'admin')
                    <li><a href="">Kelola venue</a></li>
                @else
                    <li><a>Cari</a></li>

                @endif
                <li><a href="{{route('transaksi.index')}}">Pemesanan</a></li>
                <li><a>Logout</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif

        </ul>
    </div>
</div>
