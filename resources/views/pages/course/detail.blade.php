@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <script>
            alert("Berhasil Mengikuti Kursus");
        </script>
    @endif

    <div class="header" id="detail">
        <div class="container">
            <div class="row justify-content-center">
                <div style="width: 600px">
                    <h2 class="text-dark fw-bold text-center py-3">{{ $course->title }}</h2>
                    <p class="text-secondary text-center py-3">{{ $course->sub_title }}</p>
                    <div class="row" id="statistic-course">
                        <div class="col-md-4 mb-3">
                            <div class="row">
                                <span>Member</span>
                                <span class="fw-bold">{{ $course->userCourses->count() }} <span
                                        class="fw-normal">bergabung</span></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="row">
                                <span>Sertifikat</span>
                                <span><i class="fas fa-check"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="row">
                                <span>Konsultasi</span>
                                <span><i class="fas fa-check"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top: -200px">
            <div class="col-md-8 mb-3">
                <img src="{{ url('/storage/' . $course->image) }}" alt="" width="100%" height="100%"
                    class="rounded shadow" style="object-fit: cover">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <form action="/course/{{ $course->slug }}" method="POST" class="card-body">
                        @csrf
                        <span class="fs-5 fw-medium">{{ $course->modules->count() }} Pelajaran</span>
                        <ul class="list-group my-3">
                            @foreach ($course->modules as $module)
                                <li class="list-group-item"><a
                                        class="text-decoration-none text-dark">{{ $module->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- @if (Auth::check())
    @if (Auth::user()->enrolledCourses()->where('course_id', $course->id))
    <button type="button" class="btn btn-success w-100">Kamu Telah Mengikuti Kursus
                                                                                                                                                                                                                                                                                                                                                                                                                                                                Ini</button>
@else
    <button type="submit" class="btn btn-primary w-100">Ambil Kursus</button>
    @endif
@else
    <a href="/login" class="btn btn-dark w-100">Login Untuk Mengikuti Kelas</a>
    @endif -->

                        @php
                            if (Auth::check()) {
                                $enrolledCourse = \App\Models\UserCourse::where('course_id', $course->id)
                                    ->where('user_id', Auth::user()->id)
                                    ->first();
                            } else {
                                $enrolledCourse = null;
                            }
                        @endphp

                        @if ($enrolledCourse)
                            <button type="button" class="btn btn-success w-100" disabled>Kamu Telah Mengikuti Kursus
                                Ini</button>
                        @elseif(Auth::check() && !$enrolledCourse)
                            <button type="submit" class="btn btn-primary w-100">Ambil Kursus</button>
                        @else
                            <a href="/login" class="btn btn-dark w-100">Login Untuk Mengikuti Kursus</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="row py-4">
            <div class="col-md-7">
                <h4>Deskripsi Kelas</h4>
                <p class="text-justify">{!! $course->description !!}</p>
            </div>
            <div class="col-md-5">
                <h4>Tutor</h4>
                <div class="card" style="border: none;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-row align-items-center gap-2">
                                <img src="{{ url('/storage/' . $course->pengajar->image) }}" alt=""
                                    class="rounded-circle" width="60" height="60" style="object-fit: cover">
                                <div class="d-flex flex-column">
                                    <span>{{ $course->pengajar->name }}</span>
                                    <span class="text-secondary">{{ $course->pengajar->semester }} |
                                        {{ $course->pengajar->prodi }}</span>
                                </div>
                            </div>
                            <a href="{{ route('profile.index', $course->pengajar->nim) }}"
                                class="btn btn-outline-primary">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-4">
            <div class="col-md-7 mb-4">
                <h4 class="my-3">Modul</h4>
                @foreach ($course->modules as $module)
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne{{ $module->id }}" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    {{ $module->title }}
                                </button>
                            </h2>
                            <div id="collapseOne{{ $module->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        @foreach ($module->lessons as $lesson)
                                            <a @if (Auth::check() && $enrolledCourse) target="_blank" href="{{ $lesson->video_url }}" @else href="#" @endif
                                                class="list-group-item list-group-item-action d-flex justify-content-between"
                                                aria-current="true">
                                                <span>{{ $lesson->title }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row py-4">
            <div class="col-md-7">
                <h4 class="my-3">Ulasan</h4>
                @if (Auth::check() && $enrolledCourse)
                    <form action="{{ route('review.post', $course->id) }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="body" class="form-control" placeholder="Berikan ulasan...">
                            <button class="btn btn-primary" type="submit">Kirim</button>
                        </div>
                    </form>
                @endif
                <div class="row">
                    @foreach ($reviews as $review)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ url('/storage/' . $review->user->image) }}" alt=""
                                            class="rounded-circle" width="70px" height="70px"
                                            style="object-fit: cover">
                                        <div>
                                            <h5>{{ $review->user->name }}</h5>
                                            <span class="text-secondary">{{ $review->user->prodi }} -
                                                {{ $review->user->semester }}</span>
                                        </div>
                                    </div>
                                    <p class="card-text my-3">{{ $review->body }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
