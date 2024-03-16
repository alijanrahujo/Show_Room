@extends('layouts.web')
@section('title', 'Customer')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Customer Detail</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="customer_detail_tab" data-toggle="pill"
                                            href="#customer_detail">Customer Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="payment_detail_tab" data-toggle="pill"
                                            href="#payment_detail">Payment Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="sale_detail_tab" data-toggle="pill" href="#sale_detail">Sale
                                            Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="purchase_detail_tab" data-toggle="pill"
                                            href="#purchase_detail">Purchase Detail</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end tab-content-->

        <div class="row">
            <div class="col-md-12">
                <div class="tab-content detail-list" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="customer_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 bg-white">
                                                <div class="tab-content" id="files-tabContent">
                                                    <div class="tab-pane fade show active" id="files-pdf">
                                                        <h4 class="mt-0 header-title mb-3"></h4>
                                                        <div class="file-box-content">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <th>Customer Name</th>
                                                                    <td>{{ $customer->customer_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Father Name</th>
                                                                    <td>
                                                                        {{ $customer->father_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Cnic</th>
                                                                    <td>{{ $customer->cnic }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Phone</th>
                                                                    <td>{{ $customer->phone }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td>{{ $customer->address }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div><!--end tab-pane-->

                                                    <!--end tab-content-->
                                                </div><!--end card-body-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end general detail-->
                    <div class="tab-pane fade" id="payment_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 bg-white">
                                                <div class="tab-content" id="files-tabContent">
                                                    <div class="tab-pane fade show active" id="files-pdf">
                                                        <h4 class="mt-0 header-title mb-3"></h4>
                                                        <div class="file-box-content">
                                                            <button type="button" class="mb-3 float-right btn btn-primary"
                                                                data-toggle="modal" data-target="#exampleModal"
                                                                data-whatever="@mdo">Add</button>
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Add Payment</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {!! Form::open([
                                                                                'route' => ['customerpayment', $customer->id],
                                                                                'method' => 'post',
                                                                                'class' => 'parsley-examples',
                                                                                'novalidate' => '',
                                                                                'enctype' => 'multipart/form-data',
                                                                            ]) !!}

                                                                            <div class="row" id="dynamic-fields">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('pending', 'Pending*') !!}
                                                                                        {!! Form::text('pending', $customer->due_amount, [
                                                                                            'class' => 'form-control',
                                                                                            'readonly' => 'readonly',
                                                                                            'placeholder' => 'Enter pending',
                                                                                        ]) !!}
                                                                                        <small id="emailHelp"
                                                                                            class="form-text text-muted"></small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('paid', 'Paying Amount*') !!}
                                                                                        {!! Form::number('paid', null, [
                                                                                            'class' => 'form-control',
                                                                                            'placeholder' => 'Enter paid',
                                                                                            'max' => $customer->due_amount,
                                                                                            'onKeyUp' => 'validatePayment(this)',
                                                                                        ]) !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('date', 'Date *') !!}
                                                                                        {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Enter date']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('type', 'Type *') !!}
                                                                                        {!! Form::select('type', ['Cash' => 'Cash', 'Online' => 'online'], null, [
                                                                                            'placeholder' => 'Select',
                                                                                            'class' => 'form-control',
                                                                                            'id' => 'type',
                                                                                        ]) !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        {!! Form::label('descrpriton', 'descrpriton*') !!}
                                                                                        {!! Form::textarea('description', null, [
                                                                                            'class' => 'form-control',
                                                                                            'id' => 'description',
                                                                                        ]) !!}
                                                                                        <small id="emailHelp"
                                                                                            class="form-text text-muted"></small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 text-center">
                                                                                    <img id="captured_image"
                                                                                        src=""
                                                                                        alt="Captured Image">
                                                                                    <input type="hidden" name="image"
                                                                                        class="image-tag">
                                                                                    <br>
                                                                                    <button type="button"
                                                                                        class="btn btn-success my-4"
                                                                                        data-toggle="modal"
                                                                                        data-target="#imageModal">
                                                                                        Take Picture
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <input type="hidden"
                                                                                            name="customer_id"
                                                                                            value="{{ $customer->id }}">
                                                                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            {!! Form::close() !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal fade" id="imageModal" tabindex="-1"
                                                                role="dialog" aria-labelledby="imageModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-md" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12 text-center">
                                                                                    <div class="m-auto" id="my_camera">
                                                                                    </div>
                                                                                    <br />
                                                                                    <input type=button
                                                                                        value="Take Snapshot"
                                                                                        onClick="take_snapshot()"
                                                                                        class="btn btn-primary">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Date</th>
                                                                        <th>Type</th>
                                                                        <th>Total Amount</th>
                                                                        <th>Paid Amount</th>
                                                                        <th>Pending Amount</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($customer->payments as $payment)
                                                                        <tr>
                                                                            <td>{{ $payment->date }}</td>
                                                                            <td>{{ $payment->type }}</td>
                                                                            <td>{{ $payment->total }}</td>
                                                                            <td>{{ $payment->received }}</td>
                                                                            <td>{{ $payment->pending }}</td>
                                                                            <td>{{ status($payment->status) }}</td>
                                                                            <td>
                                                                                <a href="{{ Route('sell.paymentreceipt', $payment->id) }}"
                                                                                    class="btn btn-sm btn-primary">
                                                                                    <i class="fa fa-print"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane fade" id="sale_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Engine No</th>
                                                    <th>Chassis No</th>
                                                    <th>Model</th>
                                                    <th>Color</th>
                                                    <th>Horse Power</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sales as $val)
                                                    @foreach ($val->saleDetail as $sale)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $val->date }}</td>
                                                            <td>{{ $sale->engine }}</td>
                                                            <td>{{ $sale->chassis }}</td>
                                                            <td>{{ $sale->model }}</td>
                                                            <td>{{ $sale->color }}</td>
                                                            <td>{{ $sale->horse_power }}</td>
                                                            <td>{{ $sale->total }}</td>
                                                            <td>{{ $sale->type }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane fade" id="purchase_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Engine No</th>
                                                    <th>Chassis No</th>
                                                    <th>Model</th>
                                                    <th>Color</th>
                                                    <th>Horse Power</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($purchases as $val)
                                                    @foreach ($val->PurchaseDetail as $purchase)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $val->date }}</td>
                                                            <td>{{ $purchase->engine }}</td>
                                                            <td>{{ $purchase->chassis }}</td>
                                                            <td>{{ $purchase->model }}</td>
                                                            <td>{{ $purchase->color }}</td>
                                                            <td>{{ $purchase->horse_power }}</td>
                                                            <td>{{ $purchase->total }}</td>
                                                            <td>{{ $purchase->type }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div><!--end tab-content-->
            </div><!--end col-->
        </div>
    </div>
@endsection
@section('style')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/pages/jquery.datatable.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 470,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 1000
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").sale(data_uri);
                $("#captured_image").attr('src', data_uri);
                $('#imageModal').modal('hide');
            });
        }
    </script>
    <script>
        function validatePayment(input) {
            var pendingAmount = parseFloat(document.getElementById('pending').value);
            var payingAmount = parseFloat(input.value);

            if (payingAmount > pendingAmount) {
                input.value = pendingAmount;
            }
        }
    </script>
@endsection
