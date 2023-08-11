<x-app-layout>
    @if (session('message'))
        <div class="alert alert-warning">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    @endif
    <div class="p-3">
        <!-- The button to open modal -->
        <label for="tambahHargaModal" class="mb-4 btn btn-primary">Tambah harga</label>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="tambahHargaModal" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <form method="post" action="{{ route('harga.tambah', $venue->id) }}">
                    @csrf

                    <input type="number" name="price" class="mx-auto input input-bordered input-primary w-fit">
                    <div class="modal-action">
                        <!-- if there is a button in form, it will close the modal -->
                        <label for="tambahHargaModal" class="btn">Close!</label>

                        <button class="btn" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($prices as $price)
            <div class="flex items-center space-x-4">
                <h4>Sesi dengan harga @currency($price->price)</h4>
                <a class="btn btn-xs btn-primary" href="{{ route('sesi.tambah-sesi', $price->id) }}">Tambah sesi</a>
                <form action="{{ route('price.destroy', $price->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-error btn-xs">Hapus harga</button>
                </form>
            </div>
            <div class="mb-4 overflow-x-auto">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam mulai</th>
                            <th>Jam selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($price->sesi as $sesi)
                            <tr>
                                <th>1</th>
                                <td>{{ $sesi->tanggal }}</td>
                                <td>{{ $sesi->jam_mulai }}</td>
                                <td>{{ $sesi->jam_selesai }}</td>
                                <td>
                                    <form action="{{ route('sesi.destroy', $sesi->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit'">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-app-layout>
