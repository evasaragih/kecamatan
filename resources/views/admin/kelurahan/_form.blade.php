@php
    $kelurahan = $kelurahan ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Nama Kelurahan</label>
        <input type="text" name="nama" value="{{ old('nama', $kelurahan->nama ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Nama Lurah</label>
        <input type="text" name="nama_lurah" value="{{ old('nama_lurah', $kelurahan->nama_lurah ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Alamat Kantor</label>
        <input type="text" name="alamat_kantor" value="{{ old('alamat_kantor', $kelurahan->alamat_kantor ?? '') }}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Jumlah Penduduk (jiwa)</label>
        <input type="number" name="jumlah_penduduk" value="{{ old('jumlah_penduduk', $kelurahan->jumlah_penduduk ?? '') }}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Luas Wilayah (km²)</label>
        <input type="number" name="luas_wilayah_km2" value="{{ old('luas_wilayah_km2', $kelurahan->luas_wilayah_km2 ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto {{ $kelurahan ? '(kosongkan jika tidak ingin mengubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($kelurahan && $kelurahan->foto)
            <img src="{{ asset('storage/'.$kelurahan->foto) }}" class="mt-2 rounded" style="height:80px;">
        @endif
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $kelurahan->deskripsi ?? '') }}</textarea>
    </div>
</div>
