@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('products.update', $product->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Kategori</label>

                    <select name="category_id" class="form-select">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->nama_kategori }}

                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label>Nama Produk</label>

                    <input type="text" name="nama_produk" class="form-control" value="{{ $product->nama_produk }}">
                </div>

                <div class="mb-3">
                    <label>Harga</label>

                    <input type="number" name="harga" class="form-control" value="{{ $product->harga }}">
                </div>

                <div class="mb-3">
                    <label>Stok</label>

                    <input type="number" name="stok" class="form-control" value="{{ $product->stok }}">
                </div>

                <div class="mb-3">
                    <label>Merk</label>

                    <input type="text" name="merk" class="form-control" value="{{ $product->merk }}">
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>

                    <textarea name="deskripsi" class="form-control" rows="4">{{ $product->deskripsi }}</textarea>
                </div>

                <button class="btn btn-warning">
                    Update
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>
@endsection
