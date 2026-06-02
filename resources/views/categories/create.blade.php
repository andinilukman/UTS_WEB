@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-header">
            <h4>Tambah Kategori</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('categories.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
                            Inactive
                        </option>

                    </select>
                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

            </form>

        </div>

    </div>
@endsection
