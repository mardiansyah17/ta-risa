<x-app-layout>
    <div class="p-3">
        <a href="{{ route('venue.create') }}" class="btn btn-primary">Tambah</a>
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
                @foreach ($venues as $venue)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $venue->title }}</th>
                        <th>{{ $venue->type }}</th>
                        <th>{{ $venue->kapasistas }}</th>
                        <th>
                            <form class="inline" action="{{ route('venue.destroy', $venue->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fa-solid fa-trash bg-red-500 text-white p-2 rounded-md "></i>
                                </button>
                            </form>
                            <a href="{{ route('venue.edit', $venue->id) }}">
                                <i class="fa-solid fa-pencil bg-yellow-500 text-white p-2 rounded-md "></i>
                            </a>
                            <a href="{{ route('venue.harga', $venue->id) }}">
                                <i class="fa-solid fa-dollar-sign bg-green-500 text-white p-2 rounded-md "></i>
                            </a>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
