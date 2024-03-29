@extends('layouts.web')
@section('title','Users')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                        <li class="breadcrumb-item active">User View</li>
                    </ol>
                </div>
                <h4 class="page-title">View</h4>
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
                            <div class="row">
                                <div class="col-lg-12 bg-white">
                                    <div class="tab-content" id="files-tabContent">
                                        <div class="tab-pane fade show active" id="files-pdf">
                                            <h4 class="mt-0 header-title mb-3"></h4>
                                            <div class="file-box-content">
                                                <table class="table">
                                                    <tr class="h5">
                                                        <th>personal ID </th>
                                                        <td>{{($employee->personal_id)?$employee->personal_id:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Service Book No</th>
                                                        <td>{{($employee->service_book_no)?$employee->service_book_no:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Full Name </th>
                                                        <td>{{$employee->name}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>father Name </th>
                                                        <td>{{$employee->father_name}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>CNIC</th>
                                                        <td>{{$employee->cnic}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Date Of Birth</th>
                                                        <td>{{$employee->doa}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Phone </th>
                                                        <td>{{$employee->mobile}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Education </th>
                                                        <td>{{($employee->education)?$employee->education:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Address </th>
                                                        <td>{{($employee->adress)?$employee->adress:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Designation </th>
                                                        <td>{{($employee->designation->designation)?$employee->designations->designation:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Employee Type </th>
                                                        <td>{{($employee->employeeType->title)?$employee->employeeTypes->title:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Date Of Appointed </th>
                                                        <td>{{($employee->doa)?$employee->doa:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Remarks </th>
                                                        <td>{{($employee->remarks)?$employee->remarks:'......'}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Status </th>
                                                        <td>{{($employee->status)?$employee->status:'......'}}</td>
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
        </div>
    </div>
    <!--end tab-content-->
</div>
@endsection
@section('style')
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('script')
<!-- Required datatable js -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/pages/jquery.datatable.init.js')}}"></script>
@endsection