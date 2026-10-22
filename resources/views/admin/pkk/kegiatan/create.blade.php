@extends('layouts.admin')

@section('title', 'Tambah Kegiatan PKK - Admin Panel')
@section('page-title', 'Tambah Kegiatan PKK')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.pkk-kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label small">Judul Kegiatan</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', now()->format('Y-m-d')) }}" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label small">Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                </div>
                <div class="col-12">
                    <label class="form-label small">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Kegiatan</button>
                <a href="{{ route('admin.pkk-kegiatan.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
