@extends('layouts.web')
@section('title', 'vehicle Report')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Reports</a></li>
                            <li class="breadcrumb-item active">vehicle Report</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Employee list</h4> -->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open([
                            'route' => 'reports.Chassis',
                            'method' => 'post',
                            'class' => 'parsley-examples',
                            'novalidate' => '',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        <div class="row" id="dynamic-fields">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('chassis', 'Chassis') !!}
                                    {!! Form::text('chassis', null, ['class' => 'form-control', 'placeholder' => 'Enter Chassis']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        @if (isset($sales))
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sale Detail</h5>
                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Engine No</th>
                                            <th>Chassis No</th>
                                            <th>Model - Color</th>
                                            <th>Type</th>
                                            <th>Seller</th>
                                            <th>Buyer Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $val)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $val->sale->date }}</td>
                                                <td>{{ $val->title }}</td>
                                                <td>{{ $val->engine }}</td>
                                                <td>{{ $val->chassis }}</td>
                                                <td>{{ $val->model . ' - ' . $val->color }}</td>
                                                <td>{{ $val->type }}</td>
                                                <td>{{ ($val->type === 'New')? 'Auto Time' : $val->sale->customer->customer_name }}
                                                <td>{{ ($val->type === 'Used') ? 'Auto Time' : $val->sale->customer->customer_name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Purchase Detail</h5>
                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Purchased From</th>
                                            <th>Chassis No</th>
                                            <th>Engine No</th>
                                            <th>Model - Color</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchases as $val)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $val->purchase->date }}</td>
                                                <td>{{ $val->owner_name == '' ? $val->purchase->purchaseable->company_name : $val->owner_name }}
                                                </td>
                                                <td>{{ $val->chassis }}</td>
                                                <td>{{ $val->engine }}</td>
                                                <td>{{ $val->model . ' - ' . $val->color }}</td>
                                                <td>{{ $val->type }}</td>
                                                <td>{{ $val->vehicle_status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        @endif

    </div><!-- container -->
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
