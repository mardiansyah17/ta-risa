<x-app-layout>
    @if(session('error'))

        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>    {{ session('error') }}</span>
        </div>
    @endif
    <form action="{{route('sesi.store-sesi',$price->id)}}" method="post" class="flex-col flex items-center mt-4">
        @method('POST')
        @csrf
        <div class=" mb-4 w-2/4 flex items-center  space-x-3">
            <label for="jam_mulai">Tanggal</label>
            <input type="date" name="tanggal" id="jam_mulai">
        </div>
        <div class=" mb-4 w-2/4 flex items-center  space-x-3">
            <label for="start_time">Jam mulai</label>
            <input type="time" name="jam_mulai" id="start_time">
        </div>
        <div class=" mb-4 w-2/4 flex items-center  space-x-3">
            <label for="end_time">Jam selesai</label>
            <input type="time" name="jam_selesai" id="end_time">
        </div>
        <div class="flex justify-center">

            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>

</x-app-layout>
