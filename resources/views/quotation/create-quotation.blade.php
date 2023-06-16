@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('navbar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                                                                            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/home" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/view-quotation" class="nav-link active">
                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                    <p>
                        Quotations
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Tables
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Penawaran Harga</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/data.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DataTables</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/jsgrid.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>jsGrid</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
                <a href="pages/calendar.html" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Calendar
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
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
                            <li class="breadcrumb-item"><a href="/view-quotation">Quotation</a></li>
                            <li class="breadcrumb-item active">Create Quotation</li>
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
                            <form action="store-quotation" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>From,</h2>
                                            <p>Nama Pengaju</p>
                                            <p>Alamat Pengaju</p>
                                            <p>Bank Pengaju</p>
                                            <p>Email Pengaju</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h2>To,</h2>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="no_invoice" hidden>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="customer_name" placeholder="Customer Name">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="address" placeholder="Customer Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="after-add">
                                        <div class="row mb-3">
                                            <div class="col-3">
                                                <input type="text" class="form-control" name="item_code[]"
                                                    placeholder="No Item">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" name="item_name[]"
                                                    placeholder="Item Name">
                                            </div>
                                            <div class="col-1">
                                                <input type="text" class="form-control" name="qty[]"
                                                    placeholder="Quantity">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" name="price[]"
                                                    placeholder="Price">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" name="sub_total[]"
                                                    placeholder="Total">
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-primary add" type="button">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2>Notes :</h2>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h2>Details :</h2>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="" placeholder="Sub Total">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Tax Rate">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Tax Amount">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Total">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Amount Paid">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Amount Due">
                                            </div>

                                            <a href="view-quotation" class="btn btn-danger" type="button">
                                                Cancel
                                            </a>
                                            <button class="btn btn-success" type="button">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </form>
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
    </script>
@endsection
