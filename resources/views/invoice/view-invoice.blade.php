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
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
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

                                                        @case(date(12, strtotime($item->created_at)))
                                                            XII
                                                        @break
                                                    @endswitch
                                                    /{{ date('Y', strtotime($item->created_at)) }}/{{ $item->no_inv }}
                                                </td>
                                                <td>{{ $item->quotation->customer_name }}</td>
                                                <td>{{ Carbon\Carbon::create($item->issue_date)->isoFormat('DD MMMM Y') }}</td>
                                                <td>{{ Carbon\Carbon::create($item->due_date)->isoFormat('DD MMMM Y') }}</td>
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
                                                            <span class="fas fa-file-invoice-dollar">&nbsp; &nbsp;</span>
                                                        </a>
                                                        <a href="/cetak-termin2/{{ $item->id }}" type="button"
                                                            title="Cetak Termin 2" target="_blank">
                                                            <span class="fas fa-file-invoice-dollar">&nbsp; &nbsp;</span>
                                                        </a>
                                                        @if ($item->file_termin2 == null && $item->file_termin1 == null)
                                                            <a href="#uploadFile{{ $item->id }}" type="button" title="Upload File 1"
                                                                data-toggle="modal">
                                                                <span class="fas fa-upload">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                            <a href="#uploadFile2{{ $item->id }}" type="button" title="Upload File 2"
                                                                data-toggle="modal">
                                                                <span class="fas fa-upload">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                        @elseif ($item->file_termin2 == null)
                                                            <a href="{{ url('download-termin1/' . $item->id) }}"
                                                                title="Download File 1" target="_blank">
                                                                <span class="fas fa-download">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                            <a href="#uploadFile2{{ $item->id }}" type="button" title="Upload File 2"
                                                                data-toggle="modal">
                                                                <span class="fas fa-upload">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('download-termin1/' . $item->id) }}"
                                                                title="Download File 1" target="_blank">
                                                                <span class="fas fa-download">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                            <a href="{{ url('download-termin2/' . $item->id) }}"
                                                                title="Download File 2" target="_blank">
                                                                <span class="fas fa-download">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                        @endif
                                                    @elseif ($item->status == 'paid')
                                                        <a href="/termin2/{{ $item->id }}" type="button"
                                                            title="Bayar Termin 2">
                                                            <span class="fas fa-coins">&nbsp; &nbsp;</span>
                                                        </a>
                                                        <a href="/cetak-termin1/{{ $item->id }}" type="button"
                                                            title="Cetak Termin 1" target="_blank">
                                                            <span class="fas fa-file-invoice-dollar">&nbsp; &nbsp;</span>
                                                        </a>
                                                        @if ($item->file_termin1 == null)
                                                            <a href="#uploadFile{{ $item->id }}" type="button" title="Upload File 1"
                                                                data-toggle="modal">
                                                                <span class="fas fa-upload">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('download-termin1/' . $item->id) }}"
                                                                title="Download File 1" target="_blank">
                                                                <span class="fas fa-download">&nbsp;&nbsp;&nbsp;</span>
                                                            </a>
                                                        @endif

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
                                            <div class="modal fade" id="uploadFile{{ $item->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Termin 1
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/upload-termin1/{{ $item->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="file" class="form-control mb-3"
                                                                    id="floatingInput" name="file">
                                                                <input type="hidden" name="pathFile"
                                                                    value="{{ $item->file }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Upload</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="uploadFile2{{ $item->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Termin 2
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/upload-termin2/{{ $item->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="file" class="form-control mb-3"
                                                                    id="floatingInput" name="file">
                                                                <input type="hidden" name="pathFile"
                                                                    value="{{ $item->file }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Upload</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
