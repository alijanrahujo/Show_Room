@extends('layouts.web')
@section('title','Expenses')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Expenses Detail</a></li>
                        <li class="breadcrumb-item active">Expenses</li>
                    </ol>
                </div>
                <h4 class="page-title">Expenses</h4>
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
                                                        <th>Title </th>
                                                        <td>{{$expenses->title}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Description </th>
                                                        <td>{{$expenses->description}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Amount </th>
                                                        <td>{{($expenses->amount)}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Name </th>
                                                        <td>{{($expenses->name)}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Date</th>
                                                        <td>{{$expenses->date}}</td>
                                                    </tr>
                                                    <tr class="h5">
                                                        <th>Status </th>
                                                        <td>
                                                            @if($expenses->status == 1)
                                                            Active
                                                            @elseif($expenses->status == 0)
                                                            Inactive
                                                            @endif
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