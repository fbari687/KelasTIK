<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand font-semibold" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="" width="60">
            <a href="/"><span class="ms-3">Kelas <span style="color: #f6b737">TIK</span></span></a>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('course') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/course') }}">Kursus</a>
                </li>
            </ul>
            @if (!Auth::check())
                <div>
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-signin btn-masuk">Masuk</a>
                    <a href="{{ url('/register') }}" class="btn btn-outline-primary btn-signin btn-daftar">Daftar</a>
                </div>
            @else
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu mt-3">
                        <li><a class="dropdown-item" href="{{ route('profile.index', Auth::user()->nim) }}">Profil
                                Saya</a></li>
                        <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</nav>
