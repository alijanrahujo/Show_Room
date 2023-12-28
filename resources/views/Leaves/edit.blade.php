@extends('layouts.web')
@section('title','Customer')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Employee Type</a></li>
                        <li class="breadcrumb-item active">Add Employee Type</li>
                    </ol>
                </div>
                <!-- <h4 class="page-title">Add Employee Type</h4> -->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($leave, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['Leaves.update', $leave->id]]) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="leave_title">Leave Title</label>
                                {!! Form::text('leave_title', null, array('placeholder' => 'Leave Title','class' => 'form-control','id'=>'leave_title')) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="leave_type">Leave Type</label>
                                {!! Form::select('leave_type',['Casual'=>'Casual','Anual'=>'Anual'], null, array('placeholder' => 'Select','class' => 'form-control','id'=>'leave_type')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="employee">Select Employee</label>
                                {!! Form::select('employee_id',$employees, null, array('placeholder' => 'Select','class' => 'form-control','id'=>'employee')) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="from">From</label>
                            {!! form::date('from', null, array('class' => 'form-control','id'=>'from')) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="to">To</label>
                            {!! form::date('to', null, array('class' => 'form-control','id'=>'to')) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control', 'id' => 'description']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="status">Leave Type</label>
                                {!! Form::select('status',['0'=>'Pending','1'=>'Approve','2'=>'Reject'], null, array('placeholder' => 'Select','class' => 'form-control','id'=>'status')) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                                <button type="reset" class="btn btn-gradient-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end card-->
</div><!--end row-->

</div><!-- container -->
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