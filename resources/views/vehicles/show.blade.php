@extends('layouts.web')
@section('title', 'Vehicles')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Vehicles</a></li>
                            <li class="breadcrumb-item active">Vehicles list</li>
                        </ol>
                    </div>
                    <h4 class="page-title">View Vehicle</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body bg-white">
                                <table class="table">
                                    <tr class="h5">
                                        <th>Vehicle Type</th>
                                        <td>{{ $vehicle->vehicle_type ? $vehicle->vehicle_type : '......' }}</td>
                                    </tr>
                                    <tr class="h5">
                                        <th>Horse Power</th>
                                        <td>{{ $vehicle->horse_power ? $vehicle->horse_power : '......' }}</td>
                                    </tr>
                                    <tr class="h5">
                                        <th>Purchase Amount</th>
                                        <td>{{ $vehicle->purchase_price ? $vehicle->purchase_price : '......' }}</td>
                                    </tr>
                                    <tr class="h5">
                                        <th>Purchase Tax</th>
                                        <td>{{ $vehicle->purchase_tax ? $vehicle->purchase_tax : '......' }}</td>
                                    </tr>
                                    <tr class="h5">
                                        <th>Sale Price</th>
                                        <td>{{ $vehicle->sale_price ? $vehicle->sale_price : '......' }}</td>
                                    </tr>
                                    <tr class="h5">
                                        <th>Sale Tax</th>
                                        <td>{{ $vehicle->sale_tax ? $vehicle->sale_tax : '......' }}</td>
                                    </tr>
                                    <tr class="h5">
                                        <th>Status</th>
                                        <td>{{status($vehicle->status)}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
