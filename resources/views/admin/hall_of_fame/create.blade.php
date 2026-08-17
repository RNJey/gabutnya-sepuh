@extends('layouts.app')

@section('title', 'Tambah Pengurus - Admin Panel')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-transparent border-secondary" style="backdrop-filter: blur(10px);">
                <div class="card-header border-secondary d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-warning fw-bold">TAMBAH PENGURUS BARU</h5>
                    <a href="{{ route('admin.hall_of_fame.index') }}" class="btn btn-sm btn-outline-light">Kembali</a>
                </div>
                <div class="card-body p-4">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 px-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Input dengan Enctype -->
                    <form action="{{ route('admin.hall_of_fame.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">NAMA IN-GAME / PANGGILAN</label>
                            <input type="text" name="name" class="form-control bg-dark text-light border-secondary" value="{{ old('name') }}" required placeholder="Contoh: Reinnz">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">ROLE / JABATAN</label>
                            <input type="text" name="role_title" class="form-control bg-dark text-light border-secondary" value="{{ old('role_title') }}" required placeholder="Contoh: Community Owner">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">NAMA SUB-GRUP (Opsional)</label>
                            <input type="text" name="sub_group_name" class="form-control bg-dark text-light border-secondary" value="{{ old('sub_group_name') }}" placeholder="Contoh: Grup A / Cosplay Division">
                            <div class="form-text text-secondary small">Kosongkan jika jabatan ini mencakup seluruh komunitas.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary small fw-bold">UPLOAD FOTO PROFIL (PP)</label>
                            <input type="file" name="image" class="form-control bg-dark text-light border-secondary" accept="image/png, image/jpeg, image/jpg, image/webp" required>
                            <div class="form-text text-secondary small">Format: JPG, PNG, WebP. Maksimal 5MB. Disarankan rasio 1:1 (Kotak).</div>
                        </div>

                        <button type="submit" class="btn btn-glow w-100">SIMPAN DATA PENGURUS</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection