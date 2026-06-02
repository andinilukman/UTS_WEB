@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Kategori</h4>

            <a href="{{ route('categories.create') }}" class="btn btn-success">
                + Tambah Kategori
            </a>
        </div>

        <div class="card-body">

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Search --}}
            <form action="{{ route('categories.index') }}" method="GET" class="mb-3">

                <div class="input-group">

                    <input type="text" name="search" class="form-control" placeholder="Cari Nama Kategori..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary" type="submit">
                        Cari
                    </button>

                </div>

            </form>

            {{-- Tabel --}}
            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th width="25%">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)
                        <tr>

                            <td>
                                {{ $loop->iteration + ($categories->firstItem() - 1) }}
                            </td>

                            <td>{{ $category->nama_kategori }}</td>

                            <td>{{ $category->deskripsi }}</td>

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

                            <td>

                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                        Hapus

                                    </button>

                                </form>
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">
                                Data tidak ditemukan
                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $categories->links() }}
            </div>

        </div>

    </div>
@endsection
