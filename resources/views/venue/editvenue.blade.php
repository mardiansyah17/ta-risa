<x-app-layout>
    <form class="p-3 w-2/4 space-y-6 mx-auto " enctype="multipart/form-data" method="post"
          action="{{route('venue.update',$venue->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <input value="{{$venue->title}}" type="text" placeholder="Nama venue" name="title"
                   class="input input-bordered input-primary w-full "/>
            @error('title')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-4">

            <textarea class="textarea textarea-primary w-full" name="description"
                      placeholder="Deskripsi">{{$venue->description}}</textarea>
            @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
                @enderror
            </div>
            <div class="mb-4">
                @if($venue->image)
                    <img src="/storage/{{$venue->image}}" alt="gambar" class="mb-3">

                @else
                    <input type="file" class="file-input file-input-bordered file-input-primary w-full"
                           placeholder="Gambar venue" name="image"/>
                    @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                        @enderror
                    </div>

                @endif
                <div class="mb-4">
                    <input value="{{$venue->type}}" type="text" placeholder="Type" name="type"
                           class="input input-bordered input-primary w-full "/>
                    @error('type')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="number" value="{{$venue->kapasistas}}" placeholder="Kapasitas" name="kapasistas"
                               class="input input-bordered input-primary w-full "/>
                        @error('kapasistas')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input type="number" placeholder="No hp" value="{{$venue->nohp}}" name="nohp"
                                   class="input input-bordered input-primary w-full "/>
                            @error('nohp')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                                @enderror
                            </div>

                            <button class="btn btn-primary mt-4" type="submit">Update</button>
    </form>
</x-app-layout>
