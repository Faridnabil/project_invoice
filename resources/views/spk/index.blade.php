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
                                            <th>Nama/Instansi</th>
                                            <th>Nama/Instansi Client</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($spk as $item)
                                            <tr>
                                                <td>{{ $item->no }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nama1}}</td>
                                                <td>{{ $item->tgl }}</td>
                                                <td><a href="edit-spk/{{ $item->id }}">Edit</a> | <a type="button" data-toggle="modal" data-target="#deleteConfirmation">
                                                    Delete</a> | <a href="print-spk/{{ $item->id }}" target="_blank">Details</a></td>
                                            </tr>
                                            <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Apakah Anda Yakin Ingin Menghapus Data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <form action="delete-spk/{{ $item->id }}" method="GET" enctype="multipart/form-data">
                                                        <button type="submit" class="btn btn-primary" >Hapus Data</button>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        @endforeach
                                    </tbody>
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
