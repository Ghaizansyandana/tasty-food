@extends('layouts.app')

@section('hide_layout_navbar', true)
@section('title', 'Edit User')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Edit User</h2>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark">Kembali</a>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password <span class="text-muted small">(Kosongkan jika tidak diganti)</span></label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required {{ auth()->id() === $user->id ? 'disabled' : '' }}>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @if(auth()->id() === $user->id)
                                <input type="hidden" name="role" value="{{ $user->role }}">
                                <small class="text-muted mt-1 d-block">Anda tidak bisa mengubah role Anda sendiri.</small>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
