@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-header d-flex justify-content-between">
            <h4>Data Produk</h4>

            <a href="{{ route('products.create') }}" class="btn btn-success">
                Tambah Produk
            </a>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-3">

                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Cari Produk..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <select name="category" class="form-select">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>

                                {{ $category->nama_kategori }}

                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-3">

                    <button class="btn btn-primary">
                        Filter
                    </button>

                    <a href="{{ route('products.index') }}" class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </form>

            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Merk</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $product->nama_produk }}</td>

                            <td>
                                {{ $product->category->nama_kategori }}
                            </td>

                            <td>
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>

                            <td>{{ $product->stok }}</td>

                            <td>{{ $product->merk }}</td>

                            <td>

                                <a href="#" class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="#" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')">

                                        Hapus

                                    </button>

                                </form>


                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

            {{ $products->links() }}

        </div>

    </div>
@endsection
