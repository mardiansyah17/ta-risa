<x-app-layout>
    <div class="p-3">
        <!-- The button to open modal -->
        <label for="tambahHargaModal" class="btn btn-primary mb-4">Tambah harga</label>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="tambahHargaModal" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <form method="post" action="{{ route('harga.tambah', $venue->id) }}">
                    @csrf

                    <input type="number" name="price" class="input input-bordered input-primary mx-auto w-fit">
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
            </div>
            <div class="overflow-x-auto mb-4">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam mulai</th>
                            <th>Jam selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($price->sesi as $sesi)
                            <tr>
                                <th>1</th>
                                <td>{{ $sesi->tanggal }}</td>
                                <td>{{ $sesi->jam_mulai }}</td>
                                <td>{{ $sesi->jam_selesai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-app-layout>
