@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Peminjaman</h4>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">+ Catat Peminjaman</a>
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
            <th>Buku</th>
            <th>Anggota</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman as $item)
        <tr>
            <td>{{ $item->buku->judul }}</td>
            <td>{{ $item->anggota->nama }}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali ?? '-' }}</td>
            <td>
                <span class="badge bg-{{ $item->status === 'dipinjam' ? 'warning' : 'success' }}">
                    {{ $item->status }}
                </span>
            </td>
            <td>
                @if ($item->status === 'dipinjam')
                <form action="{{ route('peminjaman.kembalikan', $item) }}" method="POST" class="d-inline">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-success">Kembalikan</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $peminjaman->links() }}
@endsection