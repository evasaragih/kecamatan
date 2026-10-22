@php
    $pengurus = $pengurus ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label small">Nama Lengkap</label>
        <input type="text" name="nama" value="{{ old('nama', $pengurus->nama ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Jabatan</label>
        <input type="text" name="jabatan" value="{{ old('jabatan', $pengurus->jabatan ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label small">Urutan Tampil</label>
        <input type="number" name="urutan" value="{{ old('urutan', $pengurus->urutan ?? 0) }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto {{ $pengurus ? '(kosongkan jika tidak ingin mengubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        <small class="text-muted">Disarankan foto portrait/vertikal agar tampilan kartu maksimal.</small>
        @if($pengurus && $pengurus->foto)
            <img src="{{ asset('storage/'.$pengurus->foto) }}" class="mt-2 rounded" style="height:100px;">
        @endif
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi Singkat (opsional)</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $pengurus->deskripsi ?? '') }}</textarea>
    </div>
</div>
