@extends('layouts.app')

@section('content')
    <div class="header py-5" id="profile">
        <div class="container">
            <div class="d-flex flex-column align-items-center gap-3">
                <img src="{{ url('/storage/' . Auth::user()->image) }}" alt="" class="rounded-circle shadow-sm"
                    width="250px" height="250px" style="object-fit: cover">
                <h4>
                    {{ Auth::user()->name }}
                    <i class="fas fa-edit" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modalEditProfil"
                        style="font-size: 20px;"></i>

                    <!-- Modal -->
                    <div class="modal fade" id="modalEditProfil" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/profile/{{ Auth::user()->nim }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="image" class="form-label">Foto Profil</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="bio" class="form-label">Bio</label>
                                            <textarea name="bio" id="bio" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </h4>
                <span class="badge text-bg-primary" style="font-size: 14px">{{ Auth::user()->prodi }} | Semester
                    {{ Auth::user()->semester }}</span>
                <p class="text-center" style="width: 50%">{{ !Auth::user()->bio ? 'Tidak ada bio' : Auth::user()->bio }}</p>
            </div>
        </div>
    </div>

    <section id="course">
        <div class="container">
            <h3>Kursus Diikuti</h3>
            <div class="row py-4">
                @if ($userCourses->isEmpty())
                    <div class="text-center fw-bold">Belum ada kursus yang diikuti</div>
                @else
                    @foreach ($userCourses as $course)
                        <div class="col-md-3 mt-3">
                            <div class="card" style="border: none">
                                <img src="{{ url('/storage/' . $course->detailCourse->image) }}" class="card-img-top"
                                    alt="..." width="200" height="200">
                                <div class="card-body">
                                    <h5 class="card-title">{{ Str::limit($course->detailCourse->title, 24) }}</h5>
                                    <span
                                        class="badge text-bg-success my-2">{{ $course->detailCourse->category->name }}</span>
                                    <p class="card-text">{!! Str::limit($course->detailCourse->description, 100) !!}</p>
                                    <a href="/course/{{ $course->detailCourse->slug }}" class="btn btn-primary">Detail
                                        Kursus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
