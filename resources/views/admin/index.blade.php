<x-app-layout>
    <div class="p-3">
        <form class="flex space-x-3">

            <div class="flex items-center space-x-3">
                <label for="start">Start date:</label>
                <input name="start_date" type="date" id="start">
            </div>
            <div class="flex items-center space-x-3">
                <label for="start">End date:</label>
                <input name="end_date" type="date" id="start">
            </div>
            <select name="venue" class="select select-primary w-full max-w-xs">
                <option disabled selected>Pilih venue</option>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}">{{ $venue->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">
                <span>Filter</span>
                <i class="fa-solid fa-filter"></i>
            </button>
            <a class="btn btn-primary"
                href="{{ route('admin.download-laporan', ['start_date' => request()->query('start_date'), 'end_date' => request()->query('end_date'), 'venue' => request()->query('venue')]) }}">
                <span> Download Laporan</span>
                <i class="fa-solid fa-download"></i>
            </a>

        </form>
        <div class="overflow-x-auto">
            @include('components.table-laporan', ['pesanans' => $pesanans])
        </div>
    </div>
</x-app-layout>
