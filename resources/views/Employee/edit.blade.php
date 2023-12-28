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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
                <!-- <h4 class="page-title">Add Designation</h4> -->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row mt-4">
        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    {!! Form::model($employee, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['Employee.update', $employee->id]]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('personal', 'Personal Id') !!}
                                {!! Form::text('personal_id', null, ['class' => 'form-control', 'id' => 'personal', 'placeholder' => 'Enter Personal Id']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('service', 'Service Book No') !!}
                                {!! Form::text('service_book_no', null, ['class' => 'form-control', 'id' => 'service', 'placeholder' => 'Enter Service Book No']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Name *') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Name']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('fname', 'Father Name *') !!}
                                {!! Form::text('father_name', null, ['class' => 'form-control', 'id' => 'fname', 'placeholder' => 'Enter Father Name']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('cnic', 'CNIC *') !!}
                                {!! Form::text('cnic', null, ['class' => 'form-control', 'id' => 'cnic', 'placeholder' => 'Enter CNIC']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('dob', 'Date Of Birth *') !!}
                                {!! Form::date('dob', null, ['class' => 'form-control', 'id' => 'dob']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('mobile', 'Mobile Number *') !!}
                                {!! Form::text('mobile', null, ['class' => 'form-control', 'id' => 'mobile', 'placeholder' => 'Enter Mobile Number']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('edu', 'Education *') !!}
                                {!! Form::text('education', null, ['class' => 'form-control', 'id' => 'edu', 'placeholder' => 'Enter Education']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('employeeType', 'Employee Type *') !!}
                                {!! Form::select('employee_type_id',$employeeTypes, null, array('placeholder' => 'Select Employee Type','class' => 'form-control','id'=>'employeType')) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('designation', 'Designation *') !!}
                                {!! Form::select('designation_id',$designations, null, array('placeholder' => 'Select Designation','class' => 'form-control','id'=>'designation')) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('posting', 'Posting *') !!}
                                {!! Form::text('pop', null, ['class' => 'form-control', 'id' => 'posting', 'placeholder' => 'Enter Posting']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('doa', 'Date Of Appointment *') !!}
                                {!! Form::date('doa', null, ['class' => 'form-control', 'id' => 'doa']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('remarks', 'Remarks') !!}
                                {!! Form::text('remarks', null, ['class' => 'form-control', 'id' => 'remarks', 'placeholder' => 'Enter Remarks']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('address', 'Address') !!}
                                {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Enter Address']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('status', 'Status *') !!}
                                {!! Form::select('status',['1'=>'On Duty','2'=>'Promote','3'=>'Expire','4'=>'Retired'], null, array('placeholder' => 'Select','class' => 'form-control','id'=>'status')) !!}
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end card-->
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
