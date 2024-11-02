@extends('layouts.app')

@section('content')
    <div class="header py-5" id="profile">
        <div class="container">
            <div class="d-flex flex-column align-items-center gap-3">
                <img src="{{ url('/storage/' . $user->image) }}" alt="" class="rounded-circle shadow" width="250px"
                    height="250px" style="object-fit: cover">
                <h4>
                    {{ $user->name }}
                </h4>
                <span class="badge text-bg-primary" style="font-size: 14px">{{ $user->prodi }} | Semester
                    {{ $user->semester }}</span>
                <p class="text-center" style="width: 50%">{{ $user->bio }}</p>
            </div>
        </div>
    </div>

    <section id="course">
        <div class="container">
            <h3>Kursus Dibuat</h3>
            <div class="row py-4">
                @if ($courses->isEmpty())
                    <div class="text-center fw-bold">Belum ada kursus yang dibuat</div>
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
