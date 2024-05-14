@extends('layouts.master')
@section('title', 'Login User')

@section('content')
    <div class="container p-3 my-5 bg-info text-dark rounded-3">
        <div class="row justify-content-center my-5">
            <div class="col-md-4 border p-4 rounded bg-light">
                <h1 class="h3 mb-3 fw-normal text-center">Halaman Login User</h1>

                <!-- error message -->
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- success message -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('loginUser') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Masukan Email Kamu" required>
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukan Password Kamu" required>
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
                    {{-- <a href="{{ route('login_google') }}" class="w-100 btn btn-lg btn-danger mt-2">Login with Google</a> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
