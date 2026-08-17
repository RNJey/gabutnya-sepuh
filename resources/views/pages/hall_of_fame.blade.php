@extends('layouts.app')

@section('title', 'Hall of Fame - Gabutnya Sepuh')

@section('content')
<style>
    /* Styling Card & Efek Hover */
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #333;
        background-color: rgba(20, 20, 20, 0.5);
        backdrop-filter: blur(5px);
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 255, 255, 0.05);
        border-color: #555;
    }
    
    /* Styling Foto Profil (PP) */
    .pp-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 3px solid #333;
        transition: all 0.3s ease;
    }
    .card-hover:hover .pp-img {
        border-color: #ffc107;
        box-shadow: 0 0 15px rgba(255, 193, 7, 0.4);
    }

    /* Garis Pembatas Tier Vertikal */
    .tier-divider {
        width: 2px;
        height: 40px;
        background-color: #333;
        margin: 0 auto;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="letter-spacing: 2px;">HALL OF <span class="text-secondary">FAME</span></h1>
        <p class="text-secondary">Struktur kepengurusan markas Gabutnya Sepuh.</p>
    </div>

    <!-- FILTER DATA BERDASARKAN ROLE -->
    @php
        $owners = $members->where('role_title', 'Community Owner');
        $commAdmins = $members->where('role_title', 'Community Admin');
        $groupAdmins = $members->where('role_title', 'Group Admin');
    @endphp

    <!-- TIER 1: COMMUNITY OWNER (1 Slot) -->
    @if($owners->count() > 0)
        <div class="row justify-content-center">
            @foreach($owners as $member)
            <div class="col-8 col-sm-6 col-md-4 col-lg-3">
                <div class="card card-hover text-center h-100 p-3 rounded-4">
                    <div class="d-flex justify-content-center mt-3 mb-3">
                        <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}" class="rounded-circle pp-img">
                    </div>
                    <div class="card-body p-0">
                        <h5 class="fw-bold mb-1 text-light">{{ $member->name }}</h5>
                        <p class="text-warning small fw-bold mb-2">{{ $member->role_title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="tier-divider my-2"></div>
    @endif

    <!-- TIER 2: COMMUNITY ADMIN (5 Slot) -->
    @if($commAdmins->count() > 0)
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
            @foreach($commAdmins->take(5) as $member)
            <div class="col mb-4">
                <div class="card card-hover text-center h-100 p-3 rounded-4">
                    <div class="d-flex justify-content-center mt-3 mb-3">
                        <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}" class="rounded-circle pp-img" style="width: 100px; height: 100px;"> <!-- PP sedikit dikecilkan agar muat 5 -->
                    </div>
                    <div class="card-body p-0">
                        <h6 class="fw-bold mb-1 text-light">{{ $member->name }}</h6>
                        <p class="text-warning" style="font-size: 0.8rem; font-weight: bold; margin-bottom: 5px;">{{ $member->role_title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="tier-divider my-2"></div>
    @endif

    <!-- TIER 3: Group Admin -->
    @if($groupAdmins->count() > 0)
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 justify-content-center">
            @foreach($groupAdmins as $member)
            <div class="col mb-4">
                <div class="card card-hover text-center h-100 p-3 rounded-4">
                    <div class="d-flex justify-content-center mt-3 mb-3">
                        <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}" class="rounded-circle pp-img" style="width: 100px; height: 100px;">
                    </div>
                    <div class="card-body p-0">
                        <h6 class="fw-bold mb-1 text-light">{{ $member->name }}</h6>
                        <p class="text-warning" style="font-size: 0.8rem; font-weight: bold; margin-bottom: 5px;">{{ $member->role_title }}</p>
                        
                        @if($member->sub_group_name)
                            <span class="badge bg-dark border border-secondary text-secondary mt-1 px-2 py-1" style="border-radius: 20px; font-size: 0.7rem;">
                                {{ $member->sub_group_name }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
    
    <!-- FALLBACK JIKA ADA DATA YANG BELUM DI-ASSIGN KE 3 ROLE DI ATAS -->
    @php
        $others = $members->whereNotIn('role_title', ['Community Owner', 'Community Admin', 'Group Admin']);
    @endphp
    
    @if($others->count() > 0)
        <hr class="border-secondary my-5">
        <h5 class="text-center text-secondary mb-4">Anggota Lainnya</h5>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 justify-content-center">
            @foreach($others as $member)
                <div class="col mb-4">
                    <div class="card card-hover text-center h-100 p-3 rounded-4">
                        <div class="d-flex justify-content-center mt-3 mb-3">
                            <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}" class="rounded-circle pp-img" style="width: 100px; height: 100px;">
                        </div>
                        <div class="card-body p-0">
                            <h6 class="fw-bold mb-1 text-light">{{ $member->name }}</h6>
                            <p class="text-warning" style="font-size: 0.8rem; font-weight: bold; margin-bottom: 5px;">{{ $member->role_title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection