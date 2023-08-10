<x-app-layout>
    @include('components.hero')
    <h2 class="text-center font-bold  text-2xl mb-3">Pilih VENUE</h2>
    <div class="grid grid-cols-3 gap-5 p-2">

        @foreach ($venues as $data)
            @include('components.card', [
                'title' => $data->title,
                'desc' => $data->description,
                'id' => $data->id,
            ])
        @endforeach

    </div>
</x-app-layout>
