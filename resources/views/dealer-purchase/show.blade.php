@extends('layouts.web')
@section('title', 'Dealer Purchases')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dealer Purchases</a></li>
                            <li class="breadcrumb-item active">Purchase Detail</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Purcahse Detail</h4> -->
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
                                            data-toggle="pill" href="#general_detail">Purchase Detail</a></li>
                                    <li class="nav-item"><a class="nav-link" id="activity_detail_tab" data-toggle="pill"
                                            href="#activity_detail">Dealer</a></li>
                                    <li class="nav-item"><a class="nav-link" id="portfolio_detail_tab" data-toggle="pill"
                                            href="#portfolio_detail">Payment Detail</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content detail-list" id="pills-tabContent">
                    {{-- Purchase Detail --}}
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
                                                                        <th>Engine</th>
                                                                        <th>Chassis</th>
                                                                        <th>Color</th>
                                                                        <th>Model</th>
                                                                        <th>Amount</th>
                                                                        <th>Tax</th>
                                                                        <th>Total</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($purchases->purchaseDetail as $purchase)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td> {{ $purchase->vehicle->vehicle_type }}
                                                                            </td>
                                                                            <td> {{ $purchase->engine }} </td>
                                                                            <td> {{ $purchase->chassis }} </td>
                                                                            <td> {{ $purchase->color }} </td>
                                                                            <td> {{ $purchase->model }} </td>
                                                                            <td> {{ $purchase->purchase_amount }} </td>
                                                                            <td> {{ $purchase->purchase_tax }} </td>
                                                                            <td> {{ $purchase->total }} </td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-{{ $purchase->status == 2 ? 'success' : 'danger' }} ">{{ status($purchase->status) }}</span>
                                                                            </td>
                                                                            <td>
                                                                                {{-- <a href="{{ route('invoices', $purchase->id) }}"
                                                                                    class="btn btn-sm btn-primary">
                                                                                    <i class="fas fa-file-invoice"
                                                                                        aria-hidden="true"></i>
                                                                                </a> --}}

                                                                                {{-- <a href="{{ Route('dealer-purchase.edit', $purchase->id) }}"
                                                                                    class="btn btn-sm btn-warning">
                                                                                    <i class="fa fa-edit"
                                                                                        aria-hidden="true"></i>
                                                                                </a> --}}
                                                                                {{-- {!! Form::open([
                                                                                    'method' => 'DELETE',
                                                                                    'route' => ['dealer-purchase.destroy', $purchase->id],
                                                                                    'style' => 'display:inline',
                                                                                ]) !!}
                                                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger btn-xs']) !!}
                                                                                {!! Form::close() !!} --}}
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
                    </div><!--end purchase detail-->
                    {{-- Dealer Detail --}}
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
                                                                    <th>Dealer Name</th>
                                                                    <td>{{ $purchases->purchaseable->company_name ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dealer Phone</th>
                                                                    <td>{{ $purchases->purchaseable->phone ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dealer Cnic</th>
                                                                    <td>{{ $purchases->purchaseable->cnic ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td>{{ $purchases->purchaseable->address ?? 'Not Available' }}
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
                    </div><!--end detail detail-->
                    {{-- Payment Detail --}}
                    <div class="tab-pane fade" id="portfolio_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            {{-- <a href="{{ Route('payments.create') }}"
                                                class="mb-3 btn btn-primary float-right">Add</a> --}}
                                        </div>
                                        {{-- <button type="button" class="mb-3 float-right btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo">Add</button> --}}
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
                                                                    {!! Form::text('pending', $purchases->total_amount, [
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
                                                                    {!! Form::text('paid', null, ['class' => 'form-control', 'placeholder' => 'Enter paid']) !!}
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
                                                                        value="{{ $purchase->id }}">
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
                                                    <th>Due Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($purchases->payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->date }}</td>
                                                        <td>{{ $payment->type }}</td>
                                                        <td>{{ $payment->total }}</td>
                                                        <td>{{ $payment->received }}</td>
                                                        <td>{{ $payment->pending }}</td>
                                                        <td><span class="badge badge-lg badge-success">
                                                                {{ status($payment->status) }}
                                                            </span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end payment detail-->
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
