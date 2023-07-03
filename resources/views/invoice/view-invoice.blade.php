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
                                                        @case(date(1, strtotime($item->created_at)))
                                                            I
                                                        @break

                                                        @case(date(2, strtotime($item->created_at)))
                                                            II
                                                        @break

                                                        @case(date(3, strtotime($item->created_at)))
                                                            III
                                                        @break

                                                        @case(date(4, strtotime($item->created_at)))
                                                            IV
                                                        @break

                                                        @case(date(5, strtotime($item->created_at)))
                                                            V
                                                        @break

                                                        @case(date(6, strtotime($item->created_at)))
                                                            VI
                                                        @break

                                                        @case(date(7, strtotime($item->created_at)))
                                                            VII
                                                        @break

                                                        @case(date(8, strtotime($item->created_at)))
                                                            VIII
                                                        @break

                                                        @case(date(9, strtotime($item->created_at)))
                                                            IX
                                                        @break

                                                        @case(date(10, strtotime($item->created_at)))
                                                            X
                                                        @break

                                                        @case(date(11, strtotime($item->created_at)))
                                                            XI
                                                        @break

                                                        @case(date(11, strtotime($item->created_at)))
                                                            XII
                                                        @break
                                                    @endswitch
                                                    /{{ date('Y', strtotime($item->created_at)) }}/{{ $item->no_inv }}
                                                </td>
                                                <td>{{ $item->quotation->customer_name }}</td>
                                                <td>{{ date('d F Y', strtotime($item->issue_date)) }}</td>
                                                <td>{{ date('d F Y', strtotime($item->due_date)) }}</td>
                                                <td>Rp. {{ number_format($item->quotation->amount, 0, ',', '.') }}</td>

                                                @if ($item->status == 'unpaid')
                                                    <td style="color: red">{{ $item->status }}</td>
                                                @elseif ($item->status == 'paid')
                                                    <td style="color: rgb(160, 149, 0)">{{ $item->status }}</td>
                                                @elseif ($item->status == 'lunas')
                                                    <td style="color: green">{{ $item->status }}</td>
                                                @endif
                                                <td>
                                                    @if ($item->status == 'lunas')
                                                        <a href="/cetak-termin1/{{ $item->id }}" type="button"
                                                            title="Cetak Termin 1" target="_blank">
                                                            <span class="fas fa-eye">&nbsp; &nbsp;</span>
                                                        </a>
                                                        <a href="/cetak-termin2/{{ $item->id }}" type="button"
                                                            title="Cetak Termin 2" target="_blank">
                                                            <span class="fas fa-eye"></span>
                                                        </a>
                                                    @elseif ($item->status == 'paid')
                                                        <a href="/termin2/{{ $item->id }}" type="button"
                                                            title="Bayar Termin 2">
                                                            <span class="fas fa-coins">&nbsp; &nbsp;</span>
                                                        </a>
                                                        <a href="/cetak-termin1/{{ $item->id }}" type="button"
                                                            title="Cetak Termin 1" target="_blank">
                                                            <span class="fas fa-eye">&nbsp; &nbsp;</span>
                                                        </a>
                                                    @else
                                                        <a href="/termin1/{{ $item->id }}" type="button"
                                                            title="Bayar Termin 1">
                                                            <span class="fas fa-coins">&nbsp; &nbsp;</span>
                                                        </a>
                                                        <a href="/termin2/{{ $item->id }}" type="button"
                                                            title="Bayar Termin 2">
                                                            <span class="fas fa-coins">&nbsp; &nbsp;</span>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No. Invoice</th>
                                            <th>Customer Name</th>
                                            <th>Issue Date</th>
                                            <th>Due Date</th>
                                            <th>Invoice Total</th>
                                            <th>Status</th>
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
