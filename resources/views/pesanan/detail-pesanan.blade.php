<x-app-layout>
    <div class="border border-gray-200 shadow-md rounded-md w-4/5 p-3 mx-auto mt-5">
        <div class="">
            <div class="flex items-center space-x-3">
                <span>Kepada  </span>
                <span>:</span>
                <span>{{$pemesanan->user->name}}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span>Kode transaksi  </span>
                <span>:</span>
                <span>{{$pemesanan->kode_transaksi}}</span>
            </div>

            <div class="flex items-center space-x-3">
                <span>Tanggal  </span>
                <span>:</span>
                <span>{{$pemesanan->sesi->tanggal}}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span>Sesi  </span>
                <span>:</span>
                <span>{{$pemesanan->sesi->jam_mulai}} - {{$pemesanan->sesi->jam_selesai}}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span>Status  </span>
                <span>:</span>
                <span
                    class="badge text-slate-100 {{$pemesanan->statis == "belum bayar"?"badge-error":"badge-success"}}">{{$pemesanan->status}}</span>
            </div>
            @if($pemesanan->bukti_pembayaran)
                <a href="/storage/{{$pemesanan->bukti_pembayaran}}" class="text-blue-500">Lihat bukti
                    pembayaran</a>
            @else
                <p>Pastikan anda membayar ke BNI dengan nomor rekning 3424234091239180981 dengan total
                    Rp{{$pemesanan->sesi->price->price}}</p>
            @endif
        </div>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                <tr>
                    <th>Kode barang</th>
                    <th>Nama</th>
                    <th>Kts</th>
                    <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                <!-- row 1 -->
                <tr>
                    <th>1</th>
                    <td>{{$pemesanan->venue->title}}</td>
                    <td>1</td>
                    <td> Rp{{$pemesanan->sesi->price->price}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <form action="{{route('pesanan.bayar',$pemesanan->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" class="file-input w-full max-w-xs" name="bukti_bayar" id="bukti_bayar_input"/>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" id="upload_button" disabled>Upload bukti
                    pembayaran
                </button>
            </div>
        </form>
    </div>
    <script>
        const bukti_bayar_input = document.getElementById('bukti_bayar_input');
        const upload_button = document.getElementById('upload_button');
        bukti_bayar_input.addEventListener('change', function () {
            upload_button.removeAttribute('disabled');
        })
    </script>
</x-app-layout>
