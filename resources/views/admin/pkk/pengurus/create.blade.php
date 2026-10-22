@extends('layouts.admin')

@section('title', 'Tambah Pengurus PKK - Admin Panel')
@section('page-title', 'Tambah Pengurus PKK')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.pkk-pengurus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.pkk.pengurus._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Pengurus</button>
                <a href="{{ route('admin.pkk-pengurus.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
