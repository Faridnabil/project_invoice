@extends('layouts.app')

@section('title')
    Edit Role
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="/roles">Roles</a></li>
                            <li class="breadcrumb-item active">Edit Role</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf @method('PUT')

                    <div class="card card-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $role->name }}" placeholder="Masukan role">
                                        @error('name')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <a href="{{ route('roles.index') }}" class="btn btn-danger" type="button">
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
