<x-app-layout>
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Venue</th>
                    <th>type</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $pesanan->venue->title }}</td>
                        <td>{{ $pesanan->venue->type }}</td>
                        <td>@currency($pesanan->sesi->price->price)</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>
                            <a href="{{ route('pesanan.show', $pesanan->id) }}">Lihat</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
