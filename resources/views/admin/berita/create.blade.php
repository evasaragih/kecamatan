@extends('layouts.admin')

@section('title', 'Tambah Berita - Admin Panel')
@section('page-title', 'Tambah Berita')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.berita._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Berita</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
