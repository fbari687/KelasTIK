@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <script>
            alert("Berhasil Membuat Akun");
        </script>
    @endif

    <section id="auth">
        <div class="row justify-content-center px-3">
            <div class="col-md-4">
                <div class="card shadow-sm" style="border: none">
                    <div class="card-body p-4">
                        <h2 class="mb-3">Masuk</h2>
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span>Belum punya akun? <a href="{{ url('/register') }}"
                                        class="text-primary">Daftar</a></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span>Login sebagai pengajar? <a href="{{ url('/admin') }}"
                                        class="text-primary">Disini</a></span>
                                <button type="submit" class="btn btn-primary btn-signin float-end">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
