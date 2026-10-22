@php
    $program = $program ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Judul Program</label>
        <input type="text" name="judul" value="{{ old('judul', $program->judul ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label small">Ikon (Font Awesome)</label>
        <input type="text" name="icon" value="{{ old('icon', $program->icon ?? '') }}" class="form-control" placeholder="fa-solid fa-heart-pulse">
    </div>
    <div class="col-md-2">
        <label class="form-label small">Urutan Tampil</label>
        <input type="number" name="urutan" value="{{ old('urutan', $program->urutan ?? 0) }}" class="form-control">
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $program->deskripsi ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <div class="form-text">
            Nama kelas ikon bisa dilihat di <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">fontawesome.com</a>, contoh: <code>fa-solid fa-heart-pulse</code>.
        </div>
    </div>
</div>
