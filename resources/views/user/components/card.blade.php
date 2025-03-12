@section('card')
    <div class="container mt-4">
        <div class="row">
            @foreach ($datas as $news)
                <div class="col-md-4 mb-4">
                    <div class="card h-100" onclick="window.location.href='{{ route('news.show', $news) }}'" style="cursor: pointer;">
                        <img src="{{ Storage::url($news->image) }}" 
                             class="card-img-top" 
                             alt="Post Image"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->name }}</h5>
                            {{-- <p class="card-text">{{ $news->description }}</p> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
