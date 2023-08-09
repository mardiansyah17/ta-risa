<x-app-layout>
    <ul class="w-4/5 mx-auto mt-4">
        @foreach($prices as $price)
            <li class="mb-2">
                <span>@currency($price->price)</span>
                <a href="{{route('sesi.tambah-sesi',$price->id)}}" class="btn btn-sm btn-primary">Tambah sesi</a>
                @foreach($price->sesi as $sesi)
                    <ul>
                        <li class="mb-1">{{$sesi->jam_mulai}} - {{$sesi->jam_selesai}} {{$sesi->tanggal}}</li>
                    </ul>
                @endforeach
            </li>

        @endforeach
    </ul>
    <!-- Open the modal using ID.showModal() method -->
    <button class="btn btn-primary" onclick="my_modal_1.showModal()">open modal</button>
    <dialog id="my_modal_1" class="modal">
        <form method="post" action="{{route('harga.tambah',$venue->id)}}" class="modal-box">
            @csrf

            <input type="number" name="price" class="input input-bordered input-primary mx-auto w-fit">
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
                <button class="btn" type="submit">Tambah</button>
            </div>
        </form>
    </dialog>
</x-app-layout>
