@php
    $berita = $berita ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Judul Berita</label>
        <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Kategori</label>
        <select name="kategori" class="form-select" required>
            @foreach(['Berita', 'Pengumuman', 'Kegiatan'] as $kategori)
                <option value="{{ $kategori }}" {{ old('kategori', $berita->kategori ?? '') === $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label small">Tanggal Publish</label>
        <input type="datetime-local" name="tanggal_publish" value="{{ old('tanggal_publish', isset($berita->tanggal_publish) ? $berita->tanggal_publish->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto {{ $berita ? '(kosongkan jika tidak ingin mengubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($berita && $berita->foto)
            <img src="{{ asset('storage/'.$berita->foto) }}" class="mt-2 rounded" style="height:80px;">
        @endif
    </div>
    <div class="col-12">
        <label class="form-label small">Ringkasan Singkat</label>
        <textarea name="ringkasan" class="form-control" rows="2">{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label small">Isi Berita</label>
        <textarea name="isi" id="isi" class="form-control" rows="10" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
        <small class="text-muted">Bisa menggunakan tag HTML sederhana seperti &lt;p&gt;, &lt;b&gt;, &lt;ul&gt;.</small>
    </div>
    <div class="col-12 form-check">
        <input type="checkbox" name="is_published" value="1" class="form-check-input" id="is_published" {{ old('is_published', $berita->is_published ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_published">Terbitkan berita ini</label>
    </div>
</div>
