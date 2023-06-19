@extends('layouts.app')

@section('title')
    Tambah Surat Pekerjaan Kerjasama
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
                            <li class="breadcrumb-item"><a href="/view-quotation">SPK</a></li>
                            <li class="breadcrumb-item active">Create SPK</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="store-quotation" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-danger">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Different Width</h3>
                        </div> --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-3">
                                    <label for="">Nomor</label>
                                    <input type="text" class="form-control" placeholder=".col-3">
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="date" class="form-control" />
                                            {{-- <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <h5>Pihak Yg Bertanggung Jawab</h5>
                                    <hr>
                                </div>
                                <div class="col-6">
                                    <h5>Pihak Pertama</h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Nama/Instansi</label>
                                    <input type="text" class="form-control" placeholder=".col-3">
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="">Nama/Instansi</label>
                                    <input type="text" class="form-control" placeholder=".col-3">
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" placeholder=".col-4">
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" placeholder=".col-4">
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="">Telepon</label>
                                    <input type="text" class="form-control" placeholder=".col-4">
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="">Telepon</label>
                                    <input type="text" class="form-control" placeholder=".col-4">
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="">Nomor KTP</label>
                                    <input type="text" class="form-control" placeholder=".col-4">
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="">Nomor KTP</label>
                                    <input type="text" class="form-control" placeholder=".col-4">
                                    <br>
                                </div>
                                {{-- <div class="col-5">
                                    <input type="text" class="form-control" placeholder=".col-5">
                                </div> --}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script style="text/javascript">
        $(document).ready(function() {
            $(".add").click(function(e) {
                e.preventDefault();
                $(".after-add").append(`
                <div class="row mb-3"">
                    <div class="col-3">
                        <input type="text" class="form-control" name="item_code[]" placeholder="No Item">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" name="item_name[]" placeholder="Item Name">
                    </div>
                    <div class="col-1">
                        <input type="text" class="form-control" name="qty[]" placeholder="Quantity">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="price[]" placeholder="Price">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="sub_total[]" placeholder="Total">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-danger remove" type="button">
                            Remove
                        </button>
                    </div>
                </div>
            `)
            });
            // saat tombol remove dklik control group akan dihapus
            $(document).on("click", ".remove", function(e) {
                e.preventDefault();
                let remove = $(this).parent().parent();
                $(remove).remove();
            });
        });

        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    </script>
@endsection
