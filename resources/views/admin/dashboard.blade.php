@extends('layouts.app')

@section('title', 'Admin Panel - Gabutnya Sepuh')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar Menu Admin -->
        <div class="col-md-3 mb-4">
            <div class="card bg-dark border-secondary">
                <div class="card-header border-secondary text-warning fw-bold">
                    [ CONTROL PANEL ]
                </div>
                <div class="list-group list-group-flush">
                    <a href=" " class="list-group-item list-group-item-action bg-dark text-light border-secondary">Dashboard</a>
                    <a href="{{ route('admin.hall_of_fame.index') }}" class="list-group-item list-group-item-action bg-dark text-light border-secondary">Struktur Grup (Hall of Fame)</a>
                    <a href=" " class="list-group-item list-group-item-action bg-dark text-light border-secondary">Moderasi Feed</a>
                    <a href=" " class="list-group-item list-group-item-action bg-dark text-light border-secondary">Gacha PP</a>
                    <a href=" " class="list-group-item list-group-item-action bg-dark text-light border-secondary">Analisa Chat WA</a>
                </div>
            </div>
        </div>

        <!-- Area Konten Utama -->
        <div class="col-md-9">
            <div class="card bg-transparent border-secondary" style="backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-1">Selamat Datang, Komandan!</h3>
                    <p class="text-secondary">Pusat kendali markas Gabutnya Sepuh.</p>
                    <hr class="border-secondary">
                    
                    <div class="row mt-4">
                        <div class="col-sm-4 mb-3">
                            <div class="card bg-dark border-secondary text-center p-3">
                                <h2 class="text-warning fw-bold mb-0">96</h2>
                                <span class="small text-secondary">Total Member</span>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="card bg-dark border-secondary text-center p-3">
                                <h2 class="text-success fw-bold mb-0">0</h2>
                                <span class="small text-secondary">Feed Pending</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection