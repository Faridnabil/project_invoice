@extends('layouts.app')

@section('title')
    Tambah Users
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="/users">Users</a></li>
                            <li class="breadcrumb-item active">Tambah User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Masukan nama">
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
                                            value="{{ old('email') }}" placeholder="Masukan email">
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
                                        <select class="form-control @error('roles[]') is-invalid @enderror" name="roles[]"
                                            aria-label="Default select example" value="{{ old('roles[]') }}">
                                            @foreach ($roles as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
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
                                    <button class="btn btn-success" type="submit">
                                        Submit
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-danger" type="button">
                                        Kembali
                                    </a>
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

