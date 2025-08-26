@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-6">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-6">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
    </div>

    <h4>Produk Terbaru</h4>
    <table class="table table-bordered shadow-sm">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse($latestProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada produk</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
