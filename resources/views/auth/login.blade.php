@extends('layouts.app')

@section('title', 'Login - Gabutnya Sepuh')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card bg-transparent border-secondary" style="width: 100%; max-width: 400px; backdrop-filter: blur(10px);">
        <div class="card-body p-5 text-center">
            <h2 class="fw-bold mb-4" style="letter-spacing: 1px;">SIGN <span class="text-secondary">IN</span></h2>
            
            @if ($errors->any())
                <div class="alert alert-danger py-2" style="font-size: 0.9rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label class="form-label text-secondary small fw-bold">EMAIL</label>
                    <input type="email" name="email" class="form-control bg-dark text-light border-secondary" required autofocus style="border-radius: 8px;">
                </div>
                
                <div class="mb-4 text-start">
                    <label class="form-label text-secondary small fw-bold">PASSWORD</label>
                    <input type="password" name="password" class="form-control bg-dark text-light border-secondary" required style="border-radius: 8px;">
                </div>
                
                <button type="submit" class="btn btn-glow w-100 mb-3">MASUK MARKAS</button>
            </form>
            
            <p class="small text-secondary mt-3">Belum punya akses? <a href="{{ url('/register') }}" class="text-light fw-bold text-decoration-none">Gunakan Invite Code</a></p>
        </div>
    </div>
</div>
@endsection