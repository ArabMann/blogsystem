@section('navigation')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route("dashboard.index") }}">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                {{-- Bagian tengah --}}
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route("dashboard.index") }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.about') }}">About</a></li>

                    <!-- Dropdown menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard.category', $category) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                {{-- Bagian kanan: Login --}}
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login.index') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
