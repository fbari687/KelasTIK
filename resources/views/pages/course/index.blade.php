@extends('layouts.app')

@section('content')
    <div class="header" id="course_list">
        <div class="container">
            <div class="row justify-content-center">
                <div style="width: 600px">
                    <h2 class="text-dark fw-bold text-center">Daftar Kelas Tersedia</h2>
                    <p class="text-secondary text-center py-3">Menampilkan berbagai pilihan menarik dari mahasiswa untuk
                        mahasiswa.</p>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control search-input cari-kelas"
                                        placeholder="Cari kelas...">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex gap-2 category-section">
                        @foreach ($categories as $category)
                            <a href="/course?category={{ $category->slug }}"
                                class="btn btn-outline-primary">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <h3>Kursus Terbaru</h3>
            <div class="row py-4">
                @if ($courses->isEmpty())
                    <div class="text-center fw-bold">Belum ada kursus</div>
                @else
                    @foreach ($courses as $course)
                        <div class="col-md-3 mt-3">
                            <a href="/course/{{ $course->slug }}">
                                <div class="card" style="border: none; border-radius: 10px;">
                                    <img src="{{ url('/storage/' . $course->image) }}" class="card-img-top" alt="..."
                                        width="200" height="200">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ Str::limit($course->title, 25) }}</h5>
                                        <span class="badge text-bg-success">{{ $course->category->name }}</span>
                                        <p class="card-text my-3">{!! Str::limit($course->description, 100) !!}</p>
                                        <div>
                                            <span>Level</span>
                                            <div>
                                                @if ($course->level == 1)
                                                    <span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </span>
                                                @elseif($course->level == 2)
                                                    <span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </span>
                                                @elseif($course->level == 3)
                                                    <span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                @else
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="/course/{{ $course->slug }}" class="btn btn-primary mt-3">Detail Kursus</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
