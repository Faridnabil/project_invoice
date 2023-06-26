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
                                                <td>
                                                    {{ date('d.m', strtotime($item->tanggal_quotation)) }}/
                                                    @switch(date('m', strtotime($item->tanggal_quotation)))
                                                        @case(date(1, strtotime($item->tanggal_quotation)))
                                                            I
                                                        @break

                                                        @case(date(2, strtotime($item->tanggal_quotation)))
                                                            II
                                                        @break

                                                        @case(date(3, strtotime($item->tanggal_quotation)))
                                                            III
                                                        @break

                                                        @case(date(4, strtotime($item->tanggal_quotation)))
                                                            IV
                                                        @break

                                                        @case(date(5, strtotime($item->tanggal_quotation)))
                                                            V
                                                        @break

                                                        @case(date(6, strtotime($item->tanggal_quotation)))
                                                            VI
                                                        @break

                                                        @case(date(7, strtotime($item->tanggal_quotation)))
                                                            VII
                                                        @break

                                                        @case(date(8, strtotime($item->tanggal_quotation)))
                                                            VIII
                                                        @break

                                                        @case(date(9, strtotime($item->tanggal_quotation)))
                                                            IX
                                                        @break

                                                        @case(date(10, strtotime($item->tanggal_quotation)))
                                                            X
                                                        @break

                                                        @case(date(11, strtotime($item->tanggal_quotation)))
                                                            XI
                                                        @break

                                                        @case(date(11, strtotime($item->tanggal_quotation)))
                                                            XII
                                                        @break
                                                    @endswitch
                                                    /{{ date('Y', strtotime($item->tanggal_quotation)) }}/{{ $item->no_quotation }}
                                                </td>
                                                <td>{{ date('d F Y', strtotime($item->tanggal_quotation)) }}</td>
                                                <td>{{ $item->customer_name }}</td>
                                                <td>Rp. {{ number_format($item->amount, 0, ',', '.') }}</td>
                                                <td>
                                                    <a href="/edit-quotation/{{ $item->id }}" type="button"
                                                        title="Edit">
                                                        <span class="fas fa-edit">&nbsp;&nbsp;&nbsp;</span>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteConfirmation" type="button"
                                                        title="Delete">
                                                        <span class="fas fa-trash">&nbsp;&nbsp;&nbsp;</span>
                                                    </a>
                                                    <a href="/detail-quotation/{{ $item->id }}" type="button"
                                                        target="__blank" title="Detail">
                                                        <span class="fas fa-eye">&nbsp;&nbsp;&nbsp;</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Ingin Menghapus Data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form action="delete-quotation/{{ $item->id }}"
                                                                method="GET" enctype="multipart/form-data">
                                                                <button type="submit" class="btn btn-primary">Hapus
                                                                    Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
