@extends('layouts.admin')

@section('title', 'Profil PKK - Admin Panel')
@section('page-title', 'Kelola Profil & Sambutan PKK')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.pkk-profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small">Nama Ketua TP PKK</label>
                    <input type="text" name="nama_ketua" value="{{ old('nama_ketua', $profil->nama_ketua) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Foto Ketua TP PKK (opsional)</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    @if($profil->foto)
                        <img src="{{ asset('storage/'.$profil->foto) }}" class="mt-2 rounded" style="height:100px;">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label small">Sambutan Ketua</label>
                    <textarea name="sambutan" class="form-control" rows="7">{{ old('sambutan', $profil->sambutan) }}</textarea>
                    <div class="form-text">Tulis teks biasa, tekan Enter untuk ganti paragraf.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Visi PKK</label>
                    <textarea name="visi" class="form-control" rows="5">{{ old('visi', $profil->visi) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Misi PKK</label>
                    <textarea name="misi" class="form-control" rows="5">{{ old('misi', $profil->misi) }}</textarea>
                    <div class="form-text">Setiap poin misi bisa ditulis di baris baru, akan tersusun otomatis di halaman publik.</div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Perubahan</button>
                <a href="{{ route('pkk.index') }}" target="_blank" class="btn btn-outline-secondary rounded-pill px-4">Lihat Halaman PKK</a>
            </div>
        </form>
    </div>
</div>
@endsection
