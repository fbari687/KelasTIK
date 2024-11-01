<footer>
    <div class="container mt-5">
        <div class="row mb-3">
            <img src="{{ asset('img/logo.png') }}" alt="" style="width: 80px">
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <h4>Kelas TIK</h4>
                <ul>
                    <li>
                        <span>Jl. Prof DR. G.A Kota Depok, Indonesia</span>
                    </li>
                    <li>
                        <span>kelastik@pnj.ac.id</span>
                    </li>
                    <li>
                        <span>©2024</span>
                    </li>
                    <li>
                        <span>Teknik Informatika</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h4>Kategori</h4>
                <ul>
                    @php
                        $categories = App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <li>
                            <a href="/course?category={{ $category->slug }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h4>Pengajar</h4>
                <ul>
                    @php
                        $kumpulanPengajar = App\Models\User::with('roles')
                            ->get()
                            ->filter(fn($user) => $user->roles->where('name', 'pengajar')->toArray())
                            ->take(5);
                    @endphp
                    @foreach ($kumpulanPengajar as $pengajar)
                        <li>
                            <a href="/profile/{{ $pengajar->nim }}">{{ $pengajar->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>
