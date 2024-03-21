@extends('layouts.web')
@section('title', 'Registrations')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Registrations</a></li>
                            <li class="breadcrumb-item active">Registration list</li>
                        </ol>
                    </div>
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
                                            href="#general_detail">Vehicle Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="activity_detail_tab" data-toggle="pill"
                                            href="#activity_detail">Customer Detail</a>
                                    </li>
                                    @if (!$register->ref_name == '')
                                        <li class="nav-item">
                                            <a class="nav-link" id="owner_detail_tab" data-toggle="pill"
                                                href="#owner_detail">Refrence
                                                Detail</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" id="delivery_detail_tab" data-toggle="pill"
                                            href="#delivery_detail">Delivery
                                            Detail</a>
                                    </li>
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
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <td>{{ $register->title }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Engine</th>
                                                                    <td>{{ $register->engine }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Chassis</th>
                                                                    <td>{{ $register->chassis }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Horse Power</th>
                                                                    <td>{{ $register->horse_power }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Model</th>
                                                                    <td>{{ $register->model }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Color</th>
                                                                    <td>{{ $register->color }}</td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <th>Customer Name</th>
                                                                    <td>{{ $register->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Father Name</th>
                                                                    <td>
                                                                        {{ $register->father_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Cnic</th>
                                                                    <td>{{ $register->cnic }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Phone</th>
                                                                    <td>{{ $register->phone }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td>{{ $register->address }}</td>
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

                    <div class="tab-pane fade" id="owner_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped-columns">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Refer: Name</th>
                                                    <td>{{ $register->ref_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Refer: Father Name</th>
                                                    <td>{{ $register->ref_father }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Refer: Cnic</th>
                                                    <td>{{ $register->ref_cnic }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Refer: Phone</th>
                                                    <td>{{ $register->ref_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Refer: Address</th>
                                                    <td>{{ $register->ref_address }}</td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>

                    <div class="tab-pane fade" id="delivery_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped-columns">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Date</th>
                                                    <td>{{ $register->date }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Type</th>
                                                    <td>{{ $register->type }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{ $register->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment</th>
                                                    <td>{{ $register->payment }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{ status($register->status) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Image</th>
                                                    <td><img src="{{ asset('storage/' . $register->image) }}"
                                                            class="img-thumbnail" width="150"></td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
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
