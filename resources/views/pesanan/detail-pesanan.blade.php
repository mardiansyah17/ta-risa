<x-app-layout>
    <div class="w-4/5 p-3 mx-auto mt-5 border border-gray-200 rounded-md shadow-md">
        <div class="">

            <div class="flex items-center space-x-3">
                <span class="w-[15%]">Kepada </span>
                <span class="w-1/12 text-center">:</span>
                <span class="w-5/12">{{ $pemesanan->user->name }}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="w-[15%]">Alamat </span>
                <span class="w-1/12 text-center">:</span>
                <span class="w-5/12">{{ $pemesanan->user->alamat }}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="w-[15%]">Kode transaksi </span>
                <span class="w-1/12 text-center">:</span>
                <span class="w-5/12">{{ $pemesanan->kode_transaksi }}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="w-[15%]">Tanggal </span>
                <span class="w-1/12 text-center">:</span>
                <span class="w-5/12">{{ $pemesanan->sesi->tanggal }}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="w-[15%]">Sesi </span>
                <span class="w-1/12 text-center">:</span>
                <span class="w-5/12">{{ $pemesanan->sesi->jam_mulai }} - {{ $pemesanan->sesi->jam_selesai }}</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="w-[15%]">Status </span>
                <span class="w-1/12 text-center">:</span>
                <span
                    class="badge text-slate-100 {{ $pemesanan->status == 'belum bayar' ? 'badge-error' : 'badge-success' }}">{{ $pemesanan->status }}</span>
            </div>

            @if ($pemesanan->bukti_pembayaran)
                <a href="/storage/{{ $pemesanan->bukti_pembayaran }}" class="text-blue-500">Lihat bukti
                    pembayaran</a>
            @else
                <p>Pastikan anda membayar ke BNI dengan nomor rekning 3424234091239180981 dengan total
                    Rp{{ $pemesanan->sesi->price->price }}</p>
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
                        <td>{{ $pemesanan->venue->title }}</td>
                        <td>1</td>
                        <td> Rp{{ $pemesanan->sesi->price->price }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="{{ route('pesanan.bayar', $pemesanan->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" class="w-full max-w-xs file-input" name="bukti_bayar" id="bukti_bayar_input" />
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
        bukti_bayar_input.addEventListener('change', function() {
            upload_button.removeAttribute('disabled');
        })
    </script>
</x-app-layout>
