@extends('layouts.master')
@section('title', 'Users')
@section('content')
    <div class="container bg-info p-3 my-5 rounded-3">
        <div class="row mx-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center">
                <h2 style="border-bottom: 2px solid rgb(73, 73, 73);">User Manage</h2>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-dark ms-3" style="font-weight: bold">Tambah
                        User</a>
                </div>
            </div>

            <table class="table table-bordered table-striped bg-light text-center" style="margin-top: 20px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Umur</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration + $users->firstItem() - 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td><button
                                    class="btn 
                                {{ $user->gender == 'male' ? 'btn-info' : 'btn-danger' }}">
                                    {{ $user->gender }}
                                </button></td>
                            <td>{{ $user->age }} Tahun</td>
                            <td>
                                {{ $user->birth }}</td>
                            <td>{{ $user->address }}</td>
                            </td>
                            <td>
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                                    class="btn btn-outline-warning">Edit</a>
                                <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
