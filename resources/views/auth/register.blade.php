@extends('layouts.app')

@section('title', 'Join - Gabutnya Sepuh')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh; margin-top: 50px; margin-bottom: 50px;">
    <div class="card bg-transparent border-secondary" style="width: 100%; max-width: 450px; backdrop-filter: blur(10px);">
        <div class="card-body p-5">
            <h2 class="fw-bold text-center mb-4" style="letter-spacing: 1px;">JOIN <span class="text-secondary">US</span></h2>

            @if ($errors->any())
                <div class="alert alert-danger py-2" style="font-size: 0.9rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-secondary small fw-bold">NAMA IN-GAME / PANGGILAN</label>
                    <input type="text" name="name" class="form-control bg-dark text-light border-secondary" value="{{ old('name') }}" required style="border-radius: 8px;">
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary small fw-bold">EMAIL</label>
                    <input type="email" name="email" class="form-control bg-dark text-light border-secondary" value="{{ old('email') }}" required style="border-radius: 8px;">
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-secondary small fw-bold">PASSWORD</label>
                    <input type="password" name="password" class="form-control bg-dark text-light border-secondary" required style="border-radius: 8px;">
                </div>

                <div class="mb-4">
                    <label class="form-label text-secondary small fw-bold">KONFIRMASI PASSWORD</label>
                    <input type="password" name="password_confirmation" class="form-control bg-dark text-light border-secondary" required style="border-radius: 8px;">
                </div>

                <hr class="border-secondary my-4">

                <!-- KUNCI EKSKLUSIFNYA DI SINI -->
                <div class="mb-4">
                    <label class="form-label text-warning small fw-bold">INVITE CODE</label>
                    <input type="text" name="invite_code" class="form-control bg-dark text-warning border-warning" required placeholder="Masukkan kode dari Admin..." style="border-radius: 8px;">
                    <div class="form-text text-secondary" style="font-size: 0.8rem;">Dapatkan kode dari grup WA Gabutnya Sepuh.</div>
                </div>
                
                <button type="submit" class="btn btn-glow w-100 mb-3">VERIFIKASI & DAFTAR</button>
            </form>
            
            <p class="small text-secondary text-center mt-3">Sudah punya akses? <a href="{{ url('/login') }}" class="text-light fw-bold text-decoration-none">Login di sini</a></p>
        </div>
    </div>
</div>
@endsection