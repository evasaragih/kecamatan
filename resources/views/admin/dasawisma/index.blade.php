@extends('layouts.admin')

@section('title', 'Kelola Dasawisma - Admin Panel')
@section('page-title', 'Kelola Dasawisma')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.dasawisma.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Dasawisma
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Dasawisma</th>
                    <th>Kelurahan</th>
                    <th>Ketua</th>
                    <th>Jumlah KK</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dasawismas as $dasawisma)
                    <tr>
                        <td>{{ $dasawisma->nama }}</td>
                        <td>{{ $dasawisma->kelurahan->nama ?? '-' }}</td>
                        <td>{{ $dasawisma->nama_ketua ?? '-' }}</td>
                        <td>{{ $dasawisma->jumlah_kk ?? '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('dasawisma.show', $dasawisma->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.dasawisma.edit', $dasawisma) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.dasawisma.destroy', $dasawisma) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus dasawisma ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada data dasawisma.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $dasawismas->links() }}
</div>
@endsection
