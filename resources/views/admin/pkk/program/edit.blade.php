@extends('layouts.admin')

@section('title', 'Edit Program Pokok PKK - Admin Panel')
@section('page-title', 'Edit Program Pokok PKK')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.pkk-program.update', $program) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.pkk.program._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Perbarui Program</button>
                <a href="{{ route('admin.pkk-program.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
