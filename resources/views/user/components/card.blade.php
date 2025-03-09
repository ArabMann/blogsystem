{{-- @php
    dd($news)
@endphp --}}
@section('card')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                {{-- <div class="card">
                    <img src="https://via.placeholder.com/350" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">Blog Post Title</h5>
                        <p class="card-text">A short summary of the blog post...</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div> --}}
                @foreach ($datas as $news)
                    <div class="card" onclick="window.location.href='{{ route('news.show', $news) }}'">
                        <img src="{{ Storage::url($news->image) }}" class="card-img-top" alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->name }}</h5>
                            {{-- <p class="card-text">{{ $news->description }}</p> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
