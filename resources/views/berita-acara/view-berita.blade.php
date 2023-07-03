@extends('layouts.app')

@section('title')
    Berita Acara Serah Terima
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Berita Acara Serah Terima</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">BAST</li>
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

                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No BAST</th>
                                            <th>No Invoice</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bast as $item)
                                            <tr>
                                                <td>{{ date('d.m', strtotime($item->created_at)) }}/
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
                                                    @endswitch/{{ date('Y', strtotime($item->created_at)) }}/{{ $item->no_bast }}
                                                </td>
                                                <td>{{ date('d.m', strtotime($item->created_at)) }}/
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
                                                    @endswitch/{{ date('Y', strtotime($item->invoice->created_at)) }}/{{ $item->invoice->no_inv }}
                                                </td>
                                                <td>{{ $item->invoice->status }}</td>
                                                <td>
                                                    <a href="/print-bast/{{ $item->id }}" type="button"
                                                        target="__blank" title="Detail">
                                                        <span class="fas fa-eye">&nbsp;&nbsp;&nbsp;</span>
                                                    </a>
                                                    @if ($item->file == null)
                                                        <a href="#" type="button" title="Upload File"
                                                            data-target="#uploadFile" data-toggle="modal">
                                                            <span class="fas fa-upload">&nbsp;&nbsp;&nbsp;</span>
                                                        </a>
                                                    @else
                                                        <a href="{{ url('download-bast/' . $item->id) }}"
                                                            title="Download File" target="_blank">
                                                            <span class="fas fa-download">&nbsp;&nbsp;&nbsp;</span>
                                                        </a>
                                                    @endif
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
                                            <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/upload-bast/{{ $item->id }}" method="POST"
                                                                enctype="multipart/form-data">
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
                                            <th>No BAST</th>
                                            <th>No Invoice</th>
                                            <th>Status</th>
                                            <th>Action</th>
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
