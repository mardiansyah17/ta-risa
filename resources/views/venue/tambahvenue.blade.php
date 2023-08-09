<x-app-layout>
    <form class="p-3 w-2/4 space-y-6 mx-auto " enctype="multipart/form-data" method="post"
          action="{{route('venue.store')}}">
        @csrf
        <div class="mb-4">
            <input type="text" placeholder="Nama venue" name="title"
                   class="input input-bordered input-primary w-full "/>
            @error('title')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-4">

            <textarea class="textarea textarea-primary w-full" name="description" placeholder="Deskripsi"></textarea>
            @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
                @enderror
            </div>
            <div class="mb-4">
                <input type="file" class="file-input file-input-bordered file-input-primary w-full"
                       placeholder="Gambar venue" name="image"/>
                @error('image')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="text" placeholder="Type" name="type"
                           class="input input-bordered input-primary w-full "/>
                    @error('type')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="number" placeholder="Kapasitas" name="kapasistas"
                               class="input input-bordered input-primary w-full "/>
                        @error('kapasistas')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input type="number" placeholder="No hp" name="nohp"
                                   class="input input-bordered input-primary w-full "/>
                            @error('nohp')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Tambah</button>
    </form>
</x-app-layout>
