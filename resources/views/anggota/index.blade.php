@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Anggota</h4>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
</div>

@if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($anggota as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>
                <a href="{{ route('anggota.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('anggota.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus anggota ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $anggota->links() }}
@endsection