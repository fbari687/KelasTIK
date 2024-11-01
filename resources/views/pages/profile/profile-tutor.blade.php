@extends('layouts.app')

@section('content')
    <div class="header py-5" id="profile">
        <div class="container">
            <div class="d-flex flex-column align-items-center gap-3">
                <img src="{{ url('/storage/' . $user->image) }}" alt="" class="rounded-circle shadow-sm" width="250px"
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
                            <div class="card" style="border: none;">
                                <img src="{{ url('/storage/' . $course->image) }}" class="card-img-top" alt="..."
                                    width="200" height="200">
                                <div class="card-body">
                                    <h5 class="card-title">{{ Str::limit($course->title, 24) }}</h5>
                                    <span class="badge text-bg-success my-2">{{ $course->category->name }}</span>
                                    <p class="card-text">{!! Str::limit($course->description, 100) !!}</p>
                                    <a href="/course/{{ $course->slug }}" class="btn btn-primary">Detail Kursus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
