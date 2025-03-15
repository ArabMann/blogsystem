@section('navigation')
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">BlogSpot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Auth::user()->role->name === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.user.index') }}">Creator</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.about.index') }}">About</a></li>
                    @endif
                    @if (Auth::user()->role->name === 'creator')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.news.index') }}">New</a></li>
                    @endif
                </ul>
                <form class="d-flex" role="search" action="#" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
@endsection
