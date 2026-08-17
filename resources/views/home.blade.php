@extends('layouts.app')

@section('title', 'Gabutnya Sepuh - Home')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center text-center" style="height: 70vh;">
    <h1 style="font-size: 4rem; font-weight: 900; letter-spacing: -2px;">
        You Are <br> <span style="text-shadow: 0 0 20px rgba(255,255,255,0.5);">Locked In!</span>
    </h1>
    <p class="text-secondary mt-3 mb-5" style="font-size: 1.2rem; max-width: 600px;">
        Selamat datang di markas Gabutnya Sepuh. Tempat nongkrong, gacha, dan pamer mekanik.
    </p>
    
    <div class="d-flex gap-3">
        <a href="#" class="btn btn-glow">VIEW COMM. FEED</a>
    </div>
</div>
@endsection