@extends('layouts.admin')

@section('title', 'Kelola Halaman Profil - Admin Panel')
@section('page-title', 'Kelola Halaman Profil')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul Halaman</th>
                    <th>Slug</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->judul }}</td>
                        <td><code>/profil/{{ $page->slug }}</code></td>
                        <td class="text-end">
                            <a href="{{ route('profil.show', $page->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.profil.edit', $page) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
