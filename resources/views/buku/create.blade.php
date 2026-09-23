@extends('layouts.app')
@section('content')
<h4>Tambah Buku Baru</h4>
<form action="{{ route('buku.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" min="0" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection