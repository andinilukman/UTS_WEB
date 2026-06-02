@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-header">
            <h4>Tambah Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('products.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Kategori</label>

                    <select name="category_id" class="form-select">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Merk</label>
                    <input type="text" name="merk" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>

                    <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>
@endsection
