@extends('layouts.app')

@section('title', 'Struktur Grup - Admin Panel')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar (Bisa dipisah jadi komponen sendiri nanti biar rapi) -->
        <div class="col-md-3 mb-4">
            <div class="card bg-dark border-secondary">
                <div class="card-header border-secondary text-warning fw-bold">
                    [ CONTROL PANEL ]
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-dark text-light border-secondary">Dashboard</a>
                    <a href="{{ route('admin.hall_of_fame.index') }}" class="list-group-item list-group-item-action bg-dark text-warning border-secondary">Struktur Grup (Hall of Fame)</a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light border-secondary">Moderasi Feed</a>
                </div>
            </div>
        </div>

        <!-- Konten Daftar Pengurus -->
        <div class="col-md-9">
            <div class="card bg-transparent border-secondary" style="backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fw-bold mb-0">Struktur Grup</h3>
                        <a href="{{ route('admin.hall_of_fame.create') }}" class="btn btn-success btn-sm fw-bold">+ TAMBAH PENGURUS</a>
                    </div>
                    <hr class="border-secondary">

                    @if(session('success'))
                        <div class="alert alert-success py-2">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-dark table-hover border-secondary align-middle">
                            <thead>
                                <tr>
                                    <th>PP</th>
                                    <th>Nama</th>
                                    <th>Role / Jabatan</th>
                                    <th>Sub-Grup</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($members as $member)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $member->image_path) }}" alt="PP" class="rounded-circle border border-secondary" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td class="fw-bold">{{ $member->name }}</td>
                                    <td class="text-warning">{{ $member->role_title }}</td>
                                    <td>{{ $member->sub_group_name ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('admin.hall_of_fame.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-4">Belum ada data kepengurusan.</td>
                                </tr>
                                @endempty
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection