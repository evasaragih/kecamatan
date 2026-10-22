@extends('layouts.admin')

@section('title', 'Edit Pejabat - Admin Panel')
@section('page-title', 'Edit Pejabat Struktural')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.pejabat.update', $pejabat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.pejabat._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Perbarui Pejabat</button>
                <a href="{{ route('admin.pejabat.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
