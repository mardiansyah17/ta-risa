<div class="mx-auto shadow-xl card w-96 bg-base-100 image-full">
    <figure><img src="{{ asset('storage/' . $img) }}" alt="Shoes" /></figure>
    <div class="card-body">
        <h2 class="card-title">{{ $title }}</h2>
        <div class="justify-end card-actions">
            <a href="{{ route('venue.show', $id) }}" class="btn btn-primary">Pesan sekarang</a>
        </div>
    </div>
</div>
