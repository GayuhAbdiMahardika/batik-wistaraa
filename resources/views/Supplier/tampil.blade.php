@extends('admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="text-primary">Daftar Supplier</h4>
            <div class="ms-auto">
                <a class="btn btn-success" href="{{ route('supplier.tambah') }}">Tambah Supplier</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Supplier</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $no => $data)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>{{ $data->nama_supplier }}</td>
                            <td>{{ $data->kontak }}</td>
                            <td>
                                <a href="{{ route('supplier.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('supplier.delete', $data->id) }}" method="post" style="display:inline;">
                                    @csrf
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
