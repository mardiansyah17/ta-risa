<x-app-layout>
    @include('components.hero')
    <h2 class="mb-3 text-2xl font-bold text-center">Pilih VENUE</h2>
    <div class="grid grid-cols-3 gap-5 p-2">

        @foreach ($venues as $data)
            @include('components.card', [
                'title' => $data->title,
                'desc' => $data->description,
                'id' => $data->id,
                'img' => $data->image,
            ])
        @endforeach

    </div>
</x-app-layout>
