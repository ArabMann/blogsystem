@extends('user.layout')

@section('content')
    @include('user.navigation', $categories)

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Tentang Kami</h1>
            <p class="lead text-muted">
                Kenali lebih dekat siapa kami, apa yang kami lakukan, dan mengapa kami melakukannya.
            </p>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-10 col-lg-8">
                <h2 class="fw-semibold">Visi Kami</h2>
                <p>
                    Kami percaya pada kekuatan teknologi untuk menyederhanakan hidup. Visi kami adalah menjadi platform
                    yang dapat dipercaya, yang memberikan manfaat nyata bagi masyarakat.
                </p>

                <h2 class="fw-semibold mt-4">Misi Kami</h2>
                <ul class="list-unstyled">
                    <li>✅ Memberikan pengalaman pengguna yang sederhana dan intuitif.</li>
                    <li>✅ Menyediakan layanan yang andal dan aman.</li>
                    <li>✅ Terus berinovasi dan mendengarkan kebutuhan pengguna.</li>
                </ul>
            </div>
        </div>

        <div class="mb-5">
            <h2 class="fw-semibold text-center mb-4">Tim Kami</h2>
            <div class="row g-4 justify-content-center">
                @foreach ($abouts as $about)
                    <div class="col-md-4 text-center">
                        <img src="{{ Storage::url($about->image) }}" class="rounded-circle mb-3 shadow" width="140" height="140" alt="{{$about->image }}">
                        <h5 class="fw-bold">{{ $about->name}}</h5>
                        <p class="text-muted">{{ $about->departement }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center">
            <p class="text-muted">Terima kasih telah menjadi bagian dari perjalanan kami. Kami selalu terbuka untuk saran dan masukan.</p>
            <p class="text-muted">INGIN MEMBUAT WEBSITE SEDERHANA ATAU UNTUK KALANGAN UMKM CLICK BUTTON DIBAWAH</p>
            <a href="https://wa.me/62895324981393?text=Halo%20saya%20ingin%20bertanya%20tentang%20produk%20Anda" target="_blank" class="btn btn-primary px-4">Hubungi Kami</a>
        </div>
    </div>
@endsection
