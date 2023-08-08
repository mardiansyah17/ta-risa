<x-app-layout>
    <div class="overflow-x-auto">
        <table class="table">
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
            @foreach($pesanans as $pesanan)

                <tr class="bg-base-200">
                    <th>1</th>
                    <td>{{$pesanan->venue->title}}</td>
                    <td>{{$pesanan->venue->type}}</td>
                    <td>Rp200.000</td>
                    <td>Belum baya</td>
                    <td>
                        <a href="{{route("pesanan.show",$pesanan->id)}}">Lihat</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
