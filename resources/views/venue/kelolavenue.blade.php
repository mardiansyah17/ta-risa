<x-app-layout>
    <div class="p-3">
        <a href="{{route('venue.create')}}" class="btn btn-primary">Tambah</a>
        <table class="table table-zebra">
            <!-- head -->
            <thead>
            <tr>
                <th>No</th>
                <th>Venue</th>
                <th>type</th>
                <th>kapasistas</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            @foreach($venues as $venue)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <th>{{$venue->title}}</th>
                    <th>{{$venue->type}}</th>
                    <th>{{$venue->kapasistas}}</th>
                    <th>
                        <form class="inline" action="{{route('venue.destroy',$venue->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                        -
                        <a href="{{route('venue.edit',$venue->id)}}">edit</a>
                        -
                        <a href="{{route('venue.harga',$venue->id)}}">Harga</a>

                    </th>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
