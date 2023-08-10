<x-app-layout>
    @if (session('error'))
        <div class="alert alert-warning">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif
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
                            <td>{{ $venue->title }}</td>
                            <td>{{ $venue->type }}</td>
                            <td id="price"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form action="{{ route('venues.pesan', $venue->id) }}" method="post">
                @csrf
                <input type="hidden" name="sesi" id="sesiInput">
                <button type="submit" class="btn btn-primary">Pesan</button>
            </form>
        </div>

    </div>

</x-app-layout>
