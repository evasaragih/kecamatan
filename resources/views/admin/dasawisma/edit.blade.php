@extends('layouts.admin')

@section('title', 'Edit Dasawisma - Admin Panel')
@section('page-title', 'Edit Dasawisma')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.dasawisma.update', $dasawisma) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.dasawisma._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Perbarui Dasawisma</button>
                <a href="{{ route('admin.dasawisma.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
