@extends('layouts.web')
@section('title','Permission')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Permissions</a></li>
                        <li class="breadcrumb-item active">Edit Permission</li>
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
                    {!! Form::model($permission, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('permission', 'Permission *') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Peermission']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-6 mt-4">
                            <input type="hidden" name="guard_name" value="web">
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