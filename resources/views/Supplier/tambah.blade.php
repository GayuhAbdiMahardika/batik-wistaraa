@extends('admin')

@section('content')
    <div class="container mt-4">
        <h4 class="text-primary mb-4">Tambah Supplier</h4>

        <div class="card p-4 shadow-sm">
            <form action="{{ route('supplier.submit') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" id="nama_supplier" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" value="{{ old('nama_supplier') }}">
                    @error('nama_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" id="kontak" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak') }}" pattern="[0-9]{10,15}" title="Nomor kontak hanya boleh terdiri dari 10 hingga 15 angka">
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
