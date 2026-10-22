@extends('layouts.admin')

@section('title', 'Edit Halaman Profil - Admin Panel')
@section('page-title', 'Edit Halaman: '.$profil->judul)

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.profil.update', $profil) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label small">Judul Halaman</label>
                    <input type="text" name="judul" value="{{ old('judul', $profil->judul) }}" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label small">Foto (opsional)</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    @if($profil->foto)
                        <img src="{{ asset('storage/'.$profil->foto) }}" class="mt-2 rounded" style="height:100px;">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label small">Konten</label>
                    <textarea name="konten" class="form-control" rows="12" required>{{ old('konten', $profil->konten) }}</textarea>
                    <div class="form-text">Tulis teks biasa. Cukup ketik seperti biasa (tekan Enter untuk ganti baris/paragraf) — tampilan di website akan mengikuti persis apa yang Anda ketik, tanpa perlu menulis kode HTML.</div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Perubahan</button>
                <a href="{{ route('admin.profil.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
