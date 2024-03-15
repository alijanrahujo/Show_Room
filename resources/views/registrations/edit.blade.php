@extends('layouts.web')
@section('title', 'Roles')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Roles</a></li>
                            <li class="breadcrumb-item active">Edit Role</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Add Designation</h4> -->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endift
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vehicle Detail</h5>
                        {!! Form::model($register, [
                            'enctype' => 'multipart/form-data',
                            'method' => 'PATCH',
                            'route' => ['registration.update', $register->id],
                        ]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('chassis', 'Chassis *') !!}
                                    {!! Form::text('chassis', null, [
                                        'class' => 'form-control',
                                        'wire:model.blur' => 'chassis',
                                        'id' => 'chassis',
                                        'placeholder' => 'Enter chassis',
                                    ]) !!}
                                    @error('chassis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('engine', 'Engine *') !!}
                                    {!! Form::text('engine', null, [
                                        'wire:model' => 'engine',
                                        'class' => 'form-control',
                                        'id' => 'engine',
                                        'placeholder' => 'Enter engine',
                                    ]) !!}
                                    @error('engine')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('vehicle_id', 'Title *') !!}
                                    {!! Form::select('vehicle_id', $vehicles, null, [
                                        'wire:model' => 'vehicle_id',
                                        'wire:model.live' => 'vehicle_id',
                                        'placeholder' => 'Select',
                                        'class' => 'form-control',
                                    ]) !!}
                                    @error('vehicle_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('horse_power', 'Horse Power *') !!}
                                    {!! Form::text('horse_power', null, [
                                        'wire:model' => 'horse_power',
                                        'class' => 'form-control',
                                        'id' => 'horse_power',
                                        'placeholder' => 'Enter horse power',
                                    ]) !!}
                                    @error('horse_power')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('model', 'Model *') !!}
                                    {!! Form::text('model', null, [
                                        'wire:model' => 'model',
                                        'class' => 'form-control',
                                        'id' => 'model',
                                        'placeholder' => 'Enter model',
                                    ]) !!}
                                    @error('model')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('color', 'Color *') !!}
                                    {!! Form::text('color', null, [
                                        'wire:model' => 'color',
                                        'class' => 'form-control',
                                        'id' => 'color',
                                        'placeholder' => 'Enter color',
                                    ]) !!}
                                    @error('color')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end card-->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Detail</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('cnic', 'Customer CNIC') !!}
                                    {!! Form::text('cnic', null, [
                                        'wire:model' => 'cnic',
                                        'wire:model.blur' => 'cnic',
                                        'class' => 'form-control',
                                        'placeholder' => 'Customer CNIC',
                                    ]) !!}
                                    @error('cnic')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('phone', 'Phone Number *') !!}
                                    {!! Form::text('phone', null, [
                                        'wire:model' => 'phone',
                                        // 'wire:blur' => 'updatephone',
                                        'class' => 'form-control',
                                        'placeholder' => 'Phone Number',
                                    ]) !!}
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Customer Name *') !!}
                                    {!! Form::text('name', null, [
                                        'wire:model' => 'name',
                                        'class' => 'form-control',
                                        'placeholder' => 'Customer Name',
                                    ]) !!}
                                    @error('customer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('father_name', 'Father Name *') !!}
                                    {!! Form::text('father_name', null, [
                                        'wire:model' => 'father_name',
                                        'class' => 'form-control',
                                        'placeholder' => 'Father Name',
                                    ]) !!}
                                    @error('father')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('address', 'Customer Address') !!}
                                    {!! Form::text('address', null, [
                                        'wire:model' => 'address',
                                        'class' => 'form-control',
                                        'placeholder' => 'Customer Address',
                                    ]) !!}
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reference Detail</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('refrence', 'cnic') !!}
                                    {!! Form::text('refrence', null, [
                                        'wire:model.blur' => 'refrence',
                                        'class' => 'form-control',
                                        'id' => 'refrence',
                                        'placeholder' => 'Enter cnic',
                                    ]) !!}
                                    @error('refrence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('ref_phone', 'Address') !!}
                                    {!! Form::text('ref_phone', null, [
                                        'wire:model' => 'ref_phone',
                                        'class' => 'form-control',
                                        'id' => 'ref_phone',
                                        'placeholder' => 'Enter phone',
                                    ]) !!}
                                    @error('ref_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('ref', 'Reference Name') !!}
                                    {!! Form::text('ref_name', null, [
                                        'wire:model' => 'ref_name',
                                        'class' => 'form-control',
                                        'id' => 'ref_name',
                                        'placeholder' => 'Enter reference Name',
                                    ]) !!}
                                    @error('ref_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('ref_father', 'Father Name') !!}
                                    {!! Form::text('ref_father', null, [
                                        'wire:model' => 'ref_father',
                                        'class' => 'form-control',
                                        'id' => 'ref_father',
                                        'placeholder' => 'Enter father name',
                                    ]) !!}
                                    @error('ref_father')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('ref_address', 'Address') !!}
                                    {!! Form::text('ref_address', null, [
                                        'wire:model' => 'ref_address',
                                        'class' => 'form-control',
                                        'id' => 'ref_address',
                                        'placeholder' => 'Enter address',
                                    ]) !!}
                                    @error('ref_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Extra Detail</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('date', 'Date *') !!}
                                    {!! Form::date('date', null, ['wire:model' => 'date', 'class' => 'form-control', 'id' => 'date']) !!}
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('issue_date', 'Isse Date *') !!}
                                    {!! Form::date('issue_date', null, [
                                        'wire:model' => 'issue_date',
                                        'class' => 'form-control',
                                        'id' => 'issue_date',
                                    ]) !!}
                                    @error('issue_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('payment', 'Payment *') !!}
                                    {!! Form::number('payment', null, [
                                        'wire:model' => 'payment',
                                        'class' => 'form-control',
                                        'id' => 'payment',
                                        'placeholder' => 'Enter Registration',
                                    ]) !!}
                                    @error('payment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('plate', 'Plate No *') !!}
                                    {!! Form::select('plate', ['Yes' => 'Yes', 'No' => 'No'], null, [
                                        'wire:model.live' => 'plate',
                                        'placeholder' => 'Select',
                                        'class' => 'form-control',
                                    ]) !!}
                                    @error('plate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('registration_no', 'Registration No') !!}
                                    {!! Form::text('registration_no', null, [
                                        'class' => 'form-control',
                                        'id' => 'registration_no',
                                        'placeholder' => 'Enter registration no',
                                    ]) !!}
                                    @error('registration_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-4">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!--end col-->
        </div>
    </div><!--end card-->
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
