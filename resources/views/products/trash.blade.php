@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Trash Product</h4>

            <a href="{{ route('products.index') }}" class="btn btn-primary">
                Kembali ke Product
            </a>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deleted At</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $product->nama_produk }}</td>

                            <td>
                                {{ $product->category->nama_kategori ?? '-' }}
                            </td>

                            <td>
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $product->deleted_at }}
                            </td>

                            <td>

                                {{-- Restore --}}
                                <form action="{{ route('products.restore', $product->id) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn btn-success btn-sm">

                                        Restore

                                    </button>

                                </form>

                                {{-- Force Delete --}}
                                <form action="{{ route('products.forceDelete', $product->id) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus permanen?')">

                                        Hapus Permanen

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center">
                                Tidak ada data di trash
                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">
                {{ $products->links() }}
            </div>

        </div>

    </div>
@endsection
