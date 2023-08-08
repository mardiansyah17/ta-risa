<x-app-layout>
    <div class="p-3">
        <img src="{{asset("/images/jakabaring.jpg")}}" class="h-[20rem] bg-cover  w-4/5 mx-auto rounded-md">
        <div class="flex space-x-3 mt-5">
            <div class="basis-[70%]">

                <h2 class="mt-4">{{$venues->title}}</h2>
                <p>{{$venues->description}}</p>
            </div>
            <div class="p-3 bg-white border border-gray-200 shadow-md rounded-md basis-[30%]">
                <h3 class="text-xl mb-3">Pesan sekarang</h3>
                @foreach($venues->prices as $price)
                    <span class="bg-green-500 p-1 text-white  rounded-md ">{{$price->price}}</span>
                    @foreach($price->sesi as $sesi)
                        <div class="mb-3">{{$sesi->jam_mulai}} - {{$sesi->jam_selesai}}</div>
                    @endforeach
                @endforeach
                <a href="{{route('venues.pesan',$venues->id)}}"
                   class="bg-blue-500 w-full rounded-md text-white py-2 mt-3 block text-center">Pesan</a>
            </div>

        </div>
    </div>

</x-app-layout>
