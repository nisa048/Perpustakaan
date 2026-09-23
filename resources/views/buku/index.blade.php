@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Buku</h4>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
</div>

@if (session('gagal'))
    <div class="alert alert-danger">{{ session('gagal') }}</div>
@endif
@if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $item)
        <tr>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->penulis }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                <a href="{{ route('buku.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('buku.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus buku ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $buku->links() }}
@endsection