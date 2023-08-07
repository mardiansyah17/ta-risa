@extends('welcome')
@section('content')
    @include('components.hero')
    <h2 class="text-center font-bold  text-2xl mb-3">Pilih VENUE</h2>
    <div class="flex justify-center space-x-3">
        @include('components.card', [
            'title' => 'Lapangan bola',
            'desc' => 'Pesan lapangan bola sekarakng',
        ])
        @include('components.card', ['title' => 'Lapangan voli', 'desc' => 'Pesan lapangan voli'])
        @include('components.card', ['title' => 'Lapangan golf', 'desc' => 'Pesan lapangan voli'])

    </div>
@endsection
