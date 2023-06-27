@extends('layouts.app')

@section('title')
    Invoice
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
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
                                Data Invoice
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Invoice</th>
                                            <th>Customer Name</th>
                                            <th>Issue Date</th>
                                            <th>Due Date</th>
                                            <th>Invoice Total</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice as $item)
                                            <tr>
                                                <td>
                                                    {{ date('d.m', strtotime($item->created_at)) }}/
                                                    @switch(date('m', strtotime($item->created_at)))
                                                        @case( date(1, strtotime($item->created_at)) )
                                                            I
                                                        @break

                                                        @case( date(2, strtotime($item->created_at)) )
                                                            II
                                                        @break

                                                        @case( date(3, strtotime($item->created_at)) )
                                                            III
                                                        @break

                                                        @case( date(4, strtotime($item->created_at)) )
                                                            IV
                                                        @break

                                                        @case( date(5, strtotime($item->created_at)) )
                                                            V
                                                        @break

                                                        @case( date(6, strtotime($item->created_at)) )
                                                            VI
                                                        @break

                                                        @case( date(7, strtotime($item->created_at)) )
                                                            VII
                                                        @break

                                                        @case( date(8, strtotime($item->created_at)) )
                                                            VIII
                                                        @break

                                                        @case( date(9, strtotime($item->created_at)) )
                                                            IX
                                                        @break

                                                        @case( date(10, strtotime($item->created_at)) )
                                                            X
                                                        @break

                                                        @case( date(11, strtotime($item->created_at)) )
                                                            XI
                                                        @break

                                                        @case( date(11, strtotime($item->created_at)) )
                                                            XII
                                                        @break
                                                    @endswitch
                                                    /{{ date('Y', strtotime($item->created_at)) }}/{{ $item->no_inv }}
                                                </td>
                                                <td>{{$item->customer_name}}</td>
                                                <td>{{ date('d F Y', strtotime($item->issue_date)) }}</td>
                                                <td>{{ date('d F Y', strtotime($item->due_date)) }}</td>
                                                <td>Rp. {{ number_format($item->amount, 0, ',', '.') }}</td>

                                                    @if ($item->status == 'unpaid')
                                                    <td style="color: red">{{$item->status}}</td>
                                                    @elseif ($item->status == 'paid')
                                                    <td style="color: green">{{$item->status}}</td>
                                                    @endif
                                                {{-- <td>Rp. {{ number_format($item->amount, 0, ',', '.') }}</td> --}}
                                                <td>
                                                    <a href="/bayar-invoice/{{ $item->id }}" type="button"
                                                        title="Detail">
                                                        <span class="fas fa-eye">&nbsp; &nbsp;</span>
                                                    </a>
                                                    <a href="/cetak-invoice/{{ $item->id }}" type="button"
                                                        title="Cetak">
                                                        <span class="fas fa-print"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7">End of record</th>
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
