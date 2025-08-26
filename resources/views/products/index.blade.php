@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <h2>Daftar Produk</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nama</th><th>Harga</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>Rp {{ number_format($p->price,0,',','.') }}</td>
                    <td>
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
