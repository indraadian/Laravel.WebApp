@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <h2>Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
