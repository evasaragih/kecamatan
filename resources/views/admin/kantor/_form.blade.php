@php
    $kantor = $kantor ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Nama Kantor</label>
        <input type="text" name="nama" value="{{ old('nama', $kantor->nama ?? '') }}" class="form-control" placeholder="Contoh: Kantor Camat Lubuk Kilangan / Kelurahan Bandar Buat" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Tipe</label>
        <select name="tipe" class="form-select" required>
            <option value="camat" {{ old('tipe', $kantor->tipe ?? '') === 'camat' ? 'selected' : '' }}>Kantor Camat</option>
            <option value="kelurahan" {{ old('tipe', $kantor->tipe ?? 'kelurahan') === 'kelurahan' ? 'selected' : '' }}>Kantor Kelurahan</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label small">Alamat Lengkap</label>
        <input type="text" name="alamat" value="{{ old('alamat', $kantor->alamat ?? '') }}" class="form-control" required>
        <small class="text-muted">Alamat ini otomatis dipakai untuk menampilkan peta Google Maps di halaman publik — pastikan penulisannya jelas dan akurat.</small>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Telepon</label>
        <input type="text" name="telepon" value="{{ old('telepon', $kantor->telepon ?? '') }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label small">Email</label>
        <input type="text" name="email" value="{{ old('email', $kantor->email ?? '') }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label small">Instagram (contoh: @keclubukkilangan)</label>
        <input type="text" name="instagram" value="{{ old('instagram', $kantor->instagram ?? '') }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label small">Urutan Tampil</label>
        <input type="number" name="urutan" value="{{ old('urutan', $kantor->urutan ?? 0) }}" class="form-control">
    </div>
</div>
