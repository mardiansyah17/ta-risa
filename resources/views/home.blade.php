<x-app-layout>
    @include('components.hero')
    <h2 class="text-center font-bold  text-2xl mb-3">Pilih VENUE</h2>
    <div class="flex justify-center space-x-3 p-2">

        @foreach($venues as $data)
            @include('components.card',[
            'title'=>$data->nama,
            'desc'=>$data->description,
            'id'=>$data->id
            ])

        @endforeach

    </div>
</x-app-layout>
