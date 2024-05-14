@extends('layouts.master')
@section('title', 'Form User')
@section('content')
    <div class="container" style="max-width: 400px;">
        <div class="row">
            <div class="col rounded-3 bg-info p-3 my-2">
                <h2 class="text-center">Tambah User</h2>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama User</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Masukkan Nama User">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Masukkan Email User">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}" placeholder="Masukkan Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" placeholder="Konfirmasi Kembali Password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                            <option value="0" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Umur</label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age"
                            name="age" value="{{ old('age') }}" placeholder="Masukkan Umur">
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="birth" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('birth') is-invalid @enderror" id="birth"
                            name="birth" value="{{ old('birth') }}">
                        @error('birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" name="address"
                            placeholder="Masukkan Alamat User">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                            <option value="0" disabled selected>Pilih Role</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin
                            </option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
