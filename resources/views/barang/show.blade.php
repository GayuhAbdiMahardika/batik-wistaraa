@extends('admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="text-primary">Data Barang</h4>
            <div class="ms-auto">
                <a class="btn btn-success" href="{{ route('barang.create') }}">Tambah Barang</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $barang)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
