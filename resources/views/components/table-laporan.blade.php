<h3 class="hidden">Laporan pemesanan</h3>
<table class="table table-zebra">

    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Pemesan</th>
            <th>NIK</th>
            <th>Venue</th>
            <th>Jadwal</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <!-- row 1 -->
        <div class="hidden">
            {{ $total = 0 }}
        </div>
        @foreach ($pesanans as $pesanan)
            <tr class="cursor-pointer" onclick="window.location='{{ route('pesanan.show', $pesanan->id) }}'">
                <th>{{ $loop->iteration }}</th>
                <th>{{ $pesanan->created_at }}</th>
                <th>{{ $pesanan->user->name }}</th>
                <th>{{ $pesanan->user->nik }}</th>
                <th>{{ $pesanan->venue->title }}</th>
                <th>{{ $pesanan->sesi->jam_mulai }}
                    - {{ $pesanan->sesi->jam_selesai }} {{ $pesanan->sesi->tanggal }}</th>
                <th>@currency($pesanan->sesi->price->price)</th>
            </tr>
            <span hidden="hidden"> {{ $total += $pesanan->sesi->price->price }}</span>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total</th>
            <th>@currency($total)</th>
        </tr>
    </tbody>
</table>
