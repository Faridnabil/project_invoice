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
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="/update-invoice/{{ $quotation->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>From,</h2>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="no_quotation"
                                                    value="{{ $quotation->no_quotation }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="customer_name"
                                                    placeholder="Customer Name" value="{{ $quotation->customer_name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="address" placeholder="{{ $quotation->address }}" readonly
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
                                        <input type="hidden" name="idreq[]" value="{{ $item->id }}">
                                        <div class="after-add" id="DBody">
                                            <div class="row mb-3" id="DRow">
                                                <div class="col-2">
                                                    <input type="text" class="form-control" name="item_code[]"
                                                        placeholder="No Item" readonly value="{{ $item->item_code }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" class="form-control" name="item_name[]"
                                                        placeholder="Item Name" readonly value="{{ $item->item_name }}">
                                                </div>
                                                <div class="col-2">
                                                    <input type="text" class="form-control" id="qty" name="qty[]"
                                                        onchange="Calc(this);" placeholder="Quantity"
                                                        value="{{ $item->qty }}" readonly>
                                                </div>
                                                <div class="col-2">
                                                    <input type="text" class="form-control" id="price" name="price[]"
                                                        onchange="Calc(this);" placeholder="Price"
                                                        value="{{ $item->price }}" readonly>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" class="form-control" id="total" name="total[]"
                                                        placeholder="Total" value="{{ $item->total }}" readonly>
                                                </div>
                                                {{-- <div class="col-1">
                                                    <button class="btn btn-primary" onclick="btnAdd()" type="button">
                                                        Add
                                                    </button>
                                                </div> --}}
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
                                                    placeholder="Sub Total" readonly value="{{ $quotation->sub_total }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="tax" name="tax"
                                                    placeholder="Tax Rate" onchange="GetTotal()"
                                                    readonly value="{{ $quotation->tax }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="tax_amount"
                                                    name="tax_amount" placeholder="Tax Amount" readonly
                                                    readonly value="{{ $quotation->tax_amount }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    readonly placeholder="Total" readonly value="{{ $quotation->amount }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="amount_paid"
                                                    name="amount_paid" placeholder="Amount Paid"
                                                    value="{{ $quotation->amount_paid }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="amount_due"
                                                    name="amount_due" placeholder="Amount Due" readonly
                                                    readonly value="{{ $quotation->amount_due }}">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        function btnAdd() {
            /*Button Add Row*/
            var v = $("#DRow").clone().appendTo("#DBody");

            $(v).find("input").val('');
            $(v).removeClass("d-none");
            $(v).find("$DRow").first().html($('#DBody div').length - 1);
        }

        function btnDelete(v) {
            /*Button Delete Row*/
            $(v).parent().parent().remove();
            GetTotal();

            $("#DBody").find("#DRow").each(
                function(index) {
                    $(this).find("#DRow").first().html(index);
                }

            );
        }

        function Calc(v) {
            /*Detail Calculation Each Row*/
            var index = $(v).parent().parent().index();

            var qty = document.getElementsByName("qty[]")[index].value;
            var price = document.getElementsByName("price[]")[index].value;

            var total = qty * price;
            document.getElementsByName("total[]")[index].value = total;

            GetTotal();
        }

        function GetTotal() {
            /*Footer Calculation*/
            var sum = 0;
            var totals = document.getElementsByName("total[]");

            for (let index = 0; index < totals.length; index++) {
                var total = totals[index].value;
                sum = +(sum) + +(total);
            }
            document.getElementById("sub_total").value = sum;

            var tax = document.getElementById("tax").value;
            var tax_amount = +(sum) * +(tax) / 100;
            document.getElementById("tax_amount").value = tax_amount;

            var grand_total = +(sum) + +(tax_amount);
            document.getElementById("amount").value = grand_total;
            document.getElementById("amount_due").value = grand_total;
        }
    </script>
@endsection
