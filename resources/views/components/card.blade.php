<div class="card w-96 bg-base-100 shadow-xl image-full">
    <figure><img src="{{ asset('lapanganbola.jpeg') }}" alt="Shoes"/></figure>
    <div class="card-body">
        <h2 class="card-title">{{ $title }}</h2>
        <p>{{ $desc }}</p>
        <div class="card-actions justify-end">
            <a href="{{route('venue.show',$id)}}" class="btn btn-primary">Pesan sekarang</a>
        </div>
    </div>
</div>
