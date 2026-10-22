@extends('layouts.admin')

@section('title', 'Tambah Kantor - Admin Panel')
@section('page-title', 'Tambah Alamat Kantor')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.kantor.store') }}" method="POST">
            @csrf
            @include('admin.kantor._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Kantor</button>
                <a href="{{ route('admin.kantor.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
