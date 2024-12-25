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
        <h1>Tambah User</h1>
        <form action="{{ route('datauser.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="manager">Manager</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
