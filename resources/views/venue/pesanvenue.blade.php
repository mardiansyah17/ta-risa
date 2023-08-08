<x-app-layout>
    <h2 class="">Pilih sesi</h2>
    <div class="flex space-x-3">
        @include('components.calendar')


        <div class="w-[30%]">
            <div class="overflow-x-auto mb-3">
                <table class="table">
                    <!-- head -->
                    <thead class="">
                    <tr>
                        <th>Venue</th>
                        <th>Type</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row 1 -->
                    <tr>
                        <td>{{$venue->title}}</td>
                        <td>{{$venue->type}}</td>
                        <td id="price"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <form action="{{route('venues.pesan',$venue->id)}}" method="post">
                @csrf
                <input type="hidden" name="sesi" id="sesiInput">
                <button type="submit" class="btn btn-primary">Pesan</button>
            </form>
        </div>

    </div>

</x-app-layout>
