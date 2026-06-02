@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-header">
            <h4>Detail Produk</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="25%">Nama Produk</th>
                    <td>{{ $product->nama_produk }}</td>
                </tr>

                <tr>
                    <th>Kategori</th>
                    <td>{{ $product->category->nama_kategori }}</td>
                </tr>

                <tr>
                    <th>Harga</th>
                    <td>
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Stok</th>
                    <td>{{ $product->stok }}</td>
                </tr>

                <tr>
                    <th>Merk</th>
                    <td>{{ $product->merk }}</td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $product->deskripsi }}</td>
                </tr>

            </table>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>
@endsection
