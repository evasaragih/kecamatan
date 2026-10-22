@extends('layouts.admin')

@section('title', 'Edit Pengurus PKK - Admin Panel')
@section('page-title', 'Edit Pengurus PKK')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.pkk-pengurus.update', $pengurus) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.pkk.pengurus._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Perbarui Pengurus</button>
                <a href="{{ route('admin.pkk-pengurus.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
