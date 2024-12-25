@extends('admin')

@section('content')
    <div class="container mt-4">
        <h4 class="text-primary mb-4">Edit Supplier</h4>

        <div class="card p-4 shadow-sm">
            <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
                @csrf

                <!-- Input Nama Supplier -->
                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" id="nama_supplier" name="nama_supplier" value="{{ $supplier->nama_supplier }}" class="form-control @error('nama_supplier') is-invalid @enderror">

                    @error('nama_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Kontak dengan validasi -->
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" id="kontak" name="kontak" value="{{ old('kontak', $supplier->kontak) }}" class="form-control @error('kontak') is-invalid @enderror" pattern="[0-9]{10,15}" title="Nomor kontak hanya boleh terdiri dari 10 hingga 15 angka">

                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
