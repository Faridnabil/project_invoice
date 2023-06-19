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
                            <li class="breadcrumb-item"><a href="/view-quotation">Quotation</a></li>
                            <li class="breadcrumb-item active">Edit Quotation</li>
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
                            <form action="/update-quotation/{{ $quotation->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>From,</h2>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="no_quotation"
                                                    value="{{ $quotation->no_quotation }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="customer_name"
                                                    placeholder="Customer Name" value="{{ $quotation->customer_name }}">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="address" placeholder="Customer Address"
                                                    value="{{ $quotation->address }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h2>To,</h2>
                                            <img src="{{ asset('template/dist/img/logo-global.png') }}"
                                                style="width: 250px; height:75px">
                                            <p>PT. Global Technology Essential<br>
                                                globaltechnologyessential@gmail.com<br>
                                                Bumi Jaya Indah E 12 A, Purwakarta, Jawa Barat 41117</p>
                                        </div>
                                    </div>
                                    @foreach ($quotation_detail as $item)
                                        <div class="row mb-3">
                                            <div class="col-2">
                                                <input type="text" class="form-control" name="item_code[]"
                                                    placeholder="No Item" value="{{ $item->item_code }}">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" name="item_name[]"
                                                    placeholder="Item Name" value="{{ $item->item_name }}">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" id="qty" name="qty[]"
                                                    onkeyup="sum()" placeholder="Quantity" value="{{ $item->qty }}">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" id="price" name="price[]"
                                                    onkeyup="sum()" placeholder="Price" value="{{ $item->price }}">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" id="total" name="total[]"
                                                    placeholder="Total" value="{{ $item->total }}" readonly>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-primary add" type="button">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    @endforeach
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
                                                <input type="text" class="form-control" id="sub_total" name="sub_total"
                                                    placeholder="Sub Total" onkeyup="sum1()" readonly
                                                    value="{{ $quotation->sub_total }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="tax" name="tax"
                                                    placeholder="Tax Rate" onkeyup="sum1()"
                                                    value="{{ $quotation->tax }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="tax_amount"
                                                    name="tax_amount" placeholder="Tax Amount" readonly
                                                    value="{{ $quotation->tax_amount }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    placeholder="Total" readonly value="{{ $quotation->amount }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="amount_paid"
                                                    name="amount_paid" placeholder="Amount Paid" onkeyup="sum1()"
                                                    value="{{ $quotation->amount_paid }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="amount_due"
                                                    name="amount_due" placeholder="Amount Due" readonly
                                                    value="{{ $quotation->amount_due }}">
                                            </div>

                                            <a href="/view-quotation" class="btn btn-danger" type="button">
                                                Cancel
                                            </a>
                                            <button class="btn btn-success" type="submit">
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

    <script>
        function sum() {
            var txtQtyValue = document.getElementById('qty').value;
            var txtPriceValue = document.getElementById('price').value;
            var result = parseInt(txtQtyValue) * parseInt(txtPriceValue);
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
                document.getElementById('sub_total').value = result;
            }
        }
    </script>

    <script>
        function sum1() {
            var txtSubTotalValue = document.getElementById('sub_total').value;
            var txtTaxValue = document.getElementById('tax').value;
            var txtAmountDueValue = document.getElementById('amount_due').value;
            var txtAmountPaidValue = document.getElementById('amount_paid').value;

            var resultTax = parseInt(txtSubTotalValue) * parseInt(txtTaxValue) / 100;
            var resultAmount = parseInt(txtSubTotalValue) * parseInt(txtTaxValue) / 100 + parseInt(txtSubTotalValue);
            if (!isNaN(resultTax)) {
                document.getElementById('tax_amount').value = resultTax;
            }

            if (!isNaN(resultAmount)) {
                document.getElementById('amount').value = resultAmount;
                document.getElementById('amount_due').value = resultAmount;
            }
        }
    </script>
@endsection
