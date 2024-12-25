@extends('admin')

@section('content')
<div class="nk-content">
    @if(session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('error-alert').style.display = 'none';
            }, 3000);
        </script>
    @endif
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 3000);
        </script>
    @endif
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="text-primary">Data User</h4>
            <div class="ms-auto">
                <a class="btn btn-success" href="{{ route('datauser.create') }}">Tambah User</a>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-md-12">
                <table class="datatable-init nk-tb-list nk-tb-ulist table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datauser as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('datauser.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('datauser.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
