@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-header">
            <h4>Detail Kategori</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="25%">Nama Kategori</th>
                    <td>{{ $category->nama_kategori }}</td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $category->deskripsi }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        @if ($category->status == 'active')
                            <span class="badge bg-success">
                                Active
                            </span>
                        @else
                            <span class="badge bg-danger">
                                Inactive
                            </span>
                        @endif
                    </td>
                </tr>

            </table>

            <hr>

            <h5>Daftar Produk Dalam Kategori Ini</h5>

            <table class="table table-striped table-bordered mt-3">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($category->products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->nama_produk }}</td>
                            <td>
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>
                            <td>{{ $product->stok }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                Belum ada produk pada kategori ini
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>
@endsection
