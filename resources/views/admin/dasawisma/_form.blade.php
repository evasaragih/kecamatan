@php
    $dasawisma = $dasawisma ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Nama Dasawisma</label>
        <input type="text" name="nama" value="{{ old('nama', $dasawisma->nama ?? '') }}" class="form-control" placeholder="Contoh: Dasawisma Melati 1" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Kelurahan</label>
        <select name="kelurahan_id" class="form-select">
            <option value="">- Pilih Kelurahan -</option>
            @foreach($kelurahans as $kelurahan)
                <option value="{{ $kelurahan->id }}" @selected(old('kelurahan_id', $dasawisma->kelurahan_id ?? '') == $kelurahan->id)>
                    {{ $kelurahan->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label small">Nama Ketua</label>
        <input type="text" name="nama_ketua" value="{{ old('nama_ketua', $dasawisma->nama_ketua ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Wilayah / RT-RW</label>
        <input type="text" name="wilayah" value="{{ old('wilayah', $dasawisma->wilayah ?? '') }}" class="form-control" placeholder="Contoh: RT 02 / RW 05">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Jumlah Kepala Keluarga</label>
        <input type="number" name="jumlah_kk" value="{{ old('jumlah_kk', $dasawisma->jumlah_kk ?? '') }}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Jumlah Anggota</label>
        <input type="number" name="jumlah_anggota" value="{{ old('jumlah_anggota', $dasawisma->jumlah_anggota ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto {{ $dasawisma ? '(kosongkan jika tidak ingin mengubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($dasawisma && $dasawisma->foto)
            <img src="{{ asset('storage/'.$dasawisma->foto) }}" class="mt-2 rounded" style="height:80px;">
        @endif
    </div>
    <div class="col-12">
        <label class="form-label small">Kegiatan Rutin</label>
        <textarea name="kegiatan" class="form-control" rows="3" placeholder="Contoh: Arisan bulanan, gotong royong, posyandu balita">{{ old('kegiatan', $dasawisma->kegiatan ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $dasawisma->deskripsi ?? '') }}</textarea>
    </div>
</div>
