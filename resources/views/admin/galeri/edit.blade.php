@extends('layouts.admin')

@section('title', 'Edit Foto Galeri - Admin Panel')
@section('page-title', 'Edit Foto Galeri')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label small">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', $galeri->tanggal_kegiatan?->format('Y-m-d')) }}" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label small">Foto (kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    @if($galeri->foto && $galeri->foto !== 'default.jpg')
                        <img src="{{ asset('storage/'.$galeri->foto) }}" class="mt-2 rounded" style="height:80px;">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label small">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Perbarui Foto</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
