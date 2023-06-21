@extends('layouts.app')

@section('title')
    Edit Users
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="/users">Users</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf @method('PUT')

                    <div class="card card-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $user->name }}" placeholder="Masukan nama">
                                        @error('name')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $user->email }}" placeholder="Masukan email">
                                        @error('email')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" placeholder="Masukan Password">
                                        @error('password')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input name="confirm-password" type="password" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="roles[]" class="form-control">
                                            @foreach ($roles as $key => $value)
                                                <option value="{{ $key }}"
                                                    @if (in_array($key, $userRole)) selected @endif>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('roles[]')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger" type="button">
                                        Kembali
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
