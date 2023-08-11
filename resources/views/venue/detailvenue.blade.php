<x-app-layout>
    <div class="p-3">
        <img src="{{ asset('storage/' . $venues->image) }}"
            class="h-[20rem] bg-cover  object-cover  w-4/5 mx-auto rounded-md">
        <div class="flex mt-5 space-x-3">
            <div class="basis-[70%]">

                <h2 class="mt-4">{{ $venues->title }}</h2>
                <p>{{ $venues->description }}</p>
            </div>
            <div class="p-3 bg-white border border-gray-200 shadow-md rounded-md basis-[30%]">
                <h3 class="mb-3 text-xl">Pesan sekarang</h3>
                <h4 class="mb-2 text-lg text-primary">Tarif</h4>
                @foreach ($venues->prices as $price)
                    <span class="p-1 text-white bg-green-500 rounded-md ">@currency($price->price)</span>
                    @foreach ($price->sesi as $sesi)
                        <div class="mb-3">{{ $sesi->jam_mulai }} - {{ $sesi->jam_selesai }}</div>
                    @endforeach
                @endforeach
                <a href="{{ route('venues.pesan', $venues->id) }}"
                    class="block w-full py-2 mt-3 text-center text-white bg-blue-500 rounded-md">Pesan</a>
            </div>

        </div>
    </div>

</x-app-layout>
