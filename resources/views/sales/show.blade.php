@extends('layouts.web')
@section('title', 'Sales')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Sales</a></li>
                            <li class="breadcrumb-item active">Sale Detail</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Sale Detail</h4> -->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general_detail_tab" data-toggle="pill"
                                            href="#general_detail">Sale Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="activity_detail_tab" data-toggle="pill"
                                            href="#customer_detail">Customer Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="portfolio_detail_tab" data-toggle="pill"
                                            href="#portfolio_detail">Payment Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="installment_detail_tab" data-toggle="pill"
                                            href="#installment_detail">Installment Detail</a>
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
                    <div class="tab-pane fade active show" id="general_detail">
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
                                                            <table
                                                                class="table table-striped table-bordered dt-responsive nowrap"
                                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Title</th>
                                                                        <th>Enging</th>
                                                                        <th>Chaches</th>
                                                                        <th>Color</th>
                                                                        <th>Model</th>
                                                                        <th>Sale Amount</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($sales->saleDetail as $sale)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td> {{ $sale->title }}</td>
                                                                            <td> {{ $sale->engine }} </td>
                                                                            <td> {{ $sale->chassis }} </td>
                                                                            <td> {{ $sale->color }} </td>
                                                                            <td> {{ $sale->model }} </td>
                                                                            <td> {{ $sale->total }} </td>
                                                                            <td>
                                                                                @if ($sales->customer->due_amount == 0)
                                                                                    <span class="badge badge-success">
                                                                                        Paid
                                                                                    </span>
                                                                                @else
                                                                                    <span class="badge badge-danger">
                                                                                        Partial Paid
                                                                                    </span>
                                                                                @endif
                                                                            <td>
                                                                                <a href="{{ route('invoices', $sales->id) }}"
                                                                                    class="btn btn-sm btn-primary">
                                                                                    <i class="fas fa-file-invoice"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
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
                    <div class="tab-pane fade" id="customer_detail">
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
                                                            <table class="table table-striped-columns">
                                                                <tr class="h5">
                                                                    <th>Customer Name</th>
                                                                    <td>{{ $sales->customer->customer_name ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Customer Phone</th>
                                                                    <td>{{ $sales->customer->phone ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Customer Cnic</th>
                                                                    <td>{{ $sales->customer->cnic ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td>{{ $sales->customer->address ?? 'Not Available' }}
                                                                    </td>
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
                        </div><!--end row-->
                    </div><!--end education detail-->
                    <div class="tab-pane fade" id="portfolio_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($sales->customer->due_amount == 0)
                                        @else
                                            <button type="button" class="mb-3 float-right btn btn-primary"
                                                data-toggle="modal" data-target="#exampleModal"
                                                data-whatever="@mdo">Add</button>
                                        @endif
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::open([
                                                            'route' => 'payments.store',
                                                            'method' => 'post',
                                                            'class' => 'parsley-examples',
                                                            'novalidate' => '',
                                                            'enctype' => 'multipart/form-data',
                                                        ]) !!}
                                                        <div class="row" id="dynamic-fields">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('pending', 'Pending*') !!}
                                                                    {!! Form::text('pending', $sales->amount - $sales->payments()->sum('received'), [
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
                                                                        'max' => $sales->amount - $sales->payments()->sum('received'),
                                                                        'onKeyUp' => 'validatePayment(this)',
                                                                    ]) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('date', 'Date *') !!}
                                                                    {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Enter date']) !!}
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
                                                                <img id="captured_image" src=""
                                                                    alt="Captured Image">
                                                                <input type="hidden" name="image" class="image-tag">
                                                                <br>
                                                                <button type="button" class="btn btn-success my-4"
                                                                    data-toggle="modal" data-target="#imageModal">
                                                                    Take Picture
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="sale_id"
                                                                        value="{{ $sales->id }}">
                                                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                            aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                <div class="m-auto" id="my_camera"></div>
                                                                <br />
                                                                <input type=button value="Take Snapshot"
                                                                    onClick="take_snapshot()" class="btn btn-primary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped-columns">
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
                                                @foreach ($sales->payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->date }}</td>
                                                        <td>{{ $payment->type }}</td>
                                                        <td>{{ $payment->total }}</td>
                                                        <td>{{ $payment->received }}</td>
                                                        <td>{{ $payment->pending }}</td>
                                                        <td>
                                                            @if ($sales->customer->due_amount == 0)
                                                                <span class="badge badge-success">
                                                                    Paid
                                                                </span>
                                                            @else
                                                                <span class="badge badge-danger">
                                                                    Partial Paid
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ Route('sell.paymentreceipt', $payment->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa fa-print" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane fade" id="installment_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Due Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $balance = 0;
                                                    $total = 0;
                                                    $paid = 0;
                                                @endphp
                                                @foreach ($sales->installments as $installment)
                                                    @php
                                                        $total += $installment->amount;
                                                        $paid += $installment->paid_amount;

                                                        $balance += $installment->amount;
                                                        $balance -= $installment->paid_amount;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $installment->date }}</td>
                                                        <td>{{ $installment->description }}</td>
                                                        <td>{{ $installment->amount }}</td>
                                                        <td>{{ $installment->paid_amount ?? 0 }}</td>
                                                        <td>{{ $balance }}</td>
                                                        <td>
                                                            @if ($sales->customer->due_amount == 0)
                                                                <span class="badge badge-success">
                                                                    Paid
                                                                </span>
                                                            @else
                                                                <span class="badge badge-danger">
                                                                    Partial Paid
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2">Total</th>
                                                    <th>{{ $total }}</th>
                                                    <th>{{ $paid }}</th>
                                                    <th>{{ $balance }}</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                    <!--end portfolio detail-->
                </div><!--end tab-content-->
            </div><!--end col-->
        </div>
        <!--end tab-content-->
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

    <style>
        #captured_image {
            width: 100%;
        }

        .modal-body {
            max-height: calc(100vh - 200px);
            /* Adjust height as needed */
            overflow-y: auto;
        }

        /* Hide the default scrollbar */
        .modal-body::-webkit-scrollbar {
            display: none;
        }

        /* Style the custom scrollbar */
        .modal-body {
            scrollbar-width: thin;
            /* "auto" or "thin" for Firefox */
            scrollbar-color: #888888 #f0f0f0;
            /* thumb color and track color */
        }

        /* Style the thumb of the custom scrollbar */
        .modal-body::-webkit-scrollbar-thumb {
            background-color: #888888;
            /* color of the scrollbar thumb */
        }

        /* Style the track of the custom scrollbar */
        .modal-body::-webkit-scrollbar-track {
            background-color: #f0f0f0;
            /* color of the scrollbar track */
        }
    </style>
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
                $(".image-tag").val(data_uri);
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
