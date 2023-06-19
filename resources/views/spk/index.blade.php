@extends('layouts.app')

@section('title')
    Surat Perjanjian Kerjasama
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Surat Perjanjian Kerjasama</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">SPK</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('create-spk') }}" type="button" class="btn btn-primary">Add SPK</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. SPK</th>
                                            <th>Nama Client/Instansi</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($quotation as $item)
                                            <tr>
                                                <td>{{ $item->no_invoice }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->customer_name }}</td>
                                                <td>{{ $item->total }}</td>
                                                <td>X</td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No. SPK</th>
                                            <th>Nama Client/Instansi</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
