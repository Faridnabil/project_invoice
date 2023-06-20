@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quotation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Quotation</li>
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
                                <a href="/create-quotation" type="button" class="btn btn-primary">Add Quotation </a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Quotation</th>
                                            <th>Created Date</th>
                                            <th>Customer Name</th>
                                            <th>Invoice Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotation as $item)
                                            <tr>
                                                <td>{{ $item->no_quotation }}</td>
                                                <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->customer_name }}</td>
                                                <td>Rp. {{ number_format($item->amount, 0, ',', '.') }}</td>
                                                <td>
                                                    <a href="/edit-quotation/{{ $item->id }}" type="button">Edit</a>
                                                    <a href="/delete-quotation/{{ $item->id }}"
                                                        type="button">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No. Quotation</th>
                                            <th>Created Date</th>
                                            <th>Customer Name</th>
                                            <th>Invoice Total</th>
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