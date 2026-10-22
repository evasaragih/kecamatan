@extends('layouts.admin')

@section('title', 'Tambah Kelurahan - Admin Panel')
@section('page-title', 'Tambah Kelurahan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.kelurahan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.kelurahan._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Kelurahan</button>
                <a href="{{ route('admin.kelurahan.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
