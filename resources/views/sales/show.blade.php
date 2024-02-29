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
                                    <li class="nav-item"><a class="nav-link active" id="general_detail_tab"
                                            data-toggle="pill" href="#general_detail">Sale Detail</a></li>
                                    <li class="nav-item"><a class="nav-link" id="activity_detail_tab" data-toggle="pill"
                                            href="#activity_detail">Customer Detail</a></li>
                                    <li class="nav-item"><a class="nav-link" id="portfolio_detail_tab" data-toggle="pill"
                                            href="#portfolio_detail">Payment Detail</a></li>
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
                                                                        <th>Purchase Amount</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($sales->saleDetail as $sale)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td> {{ '1' }}</td>
                                                                            <td> {{ $sale->engine }} </td>
                                                                            <td> {{ $sale->chassis }} </td>
                                                                            <td> {{ $sale->color }} </td>
                                                                            <td> {{ $sale->model }} </td>
                                                                            <td> {{ $sale->purchase_amount }} </td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-{{ $sales->status == 2 ? 'success' : 'danger' }} ">{{ status($sales->status) }}</span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="{{ route('invoices', $sales->id) }}"
                                                                                    class="btn btn-sm btn-primary">
                                                                                    <i class="fas fa-file-invoice"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="{{ Route('dealer-purchase.edit', $sale->id) }}"
                                                                                    class="btn btn-sm btn-warning">
                                                                                    <i class="fa fa-edit"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                {!! Form::open([
                                                                                    'method' => 'DELETE',
                                                                                    'route' => ['dealer-purchase.destroy', $sale->id],
                                                                                    'style' => 'display:inline',
                                                                                ]) !!}
                                                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger btn-xs']) !!}
                                                                                {!! Form::close() !!}
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
                    <div class="tab-pane fade" id="activity_detail">
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
                                        <div>
                                            <a href="{{ Route('payments.create') }}"
                                                class="mb-3 btn btn-primary float-right">Add</a>
                                        </div>
                                        <table class="table table-striped-columns">
                                            <thead>
                                                <tr>
                                                    <th>Purchase Amount</th>
                                                    <th>Sale Amount</th>
                                                    <th>Profit Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Pending Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->purchase_amount }}</td>
                                                        <td>{{ $payment->sale_amount }}</td>
                                                        <td>{{ $payment->profit }}</td>
                                                        <td>{{ $payment->received }}</td>
                                                        <td>{{ $payment->pending }}</td>
                                                        <td>{{ $payment->status }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end portfolio detail-->
                </div><!--end tab-content-->
            </div><!--end col-->
        </div>
        <!--end tab-content-->
    </div>
@endsection
@section('style')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
@endsection
