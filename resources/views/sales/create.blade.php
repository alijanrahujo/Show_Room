@extends('layouts.web')
@section('title','sales')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">sales</a></li>
                        <li class="breadcrumb-item active">sale bike</li>
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
                    {!! Form::open(['route' => 'sales.store', 'method' => 'post', 'class' => 'parsley-examples', 'novalidate' => '', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('customer', 'customer *') !!}
                                {!! Form::select('customer',$customers,null, array('placeholder' => 'Select','class' => 'form-control','id'=>'customer')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('purchase', 'purchase *') !!}
                                {!! Form::select('purchase',$purchases,null, array('placeholder' => 'Select','class' => 'form-control','id'=>'purchase')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title', 'Title *') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Example CD 70 CD 125']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('eng', 'Engine Number *') !!}
                                {!! Form::text('engine', null, ['class' => 'form-control', 'id' => 'eng', 'placeholder' => 'Engine Number']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('chassis', 'Chassis Number *') !!}
                                {!! Form::text('chassis', null, ['class' => 'form-control', 'id' => 'chassis', 'placeholder' => 'Chassis Number']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('model', 'Model *') !!}
                                {!! Form::text('model', null, ['class' => 'form-control', 'id' => 'model', 'placeholder' => 'Model']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('color', 'Color *') !!}
                                {!! Form::text('color', null, ['class' => 'form-control', 'id' => 'color', 'placeholder' => 'Color']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('status', 'Status *') !!}
                                {!! Form::select('status',['1'=>'Active','0'=>'Deactive'], null, array('placeholder' => 'Select','class' => 'form-control','id'=>'status')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total', 'Purchase Amount *') !!}
                                {!! Form::number('total', null, ['class' => 'form-control', 'min'=>'10000', 'id' => 'total', 'placeholder' => 'Total Amount']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('paid', 'Paid *') !!}
                                {!! Form::number('paid', null, ['class' => 'form-control', 'min'=>'10000', 'id' => 'paid', 'placeholder' => 'Paid Amount']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
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
        </div><!--end card-->
    </div><!--end col-->
</div><!--end card-->
@endsection
@section('style')

<script>
    var purchaseSelect = document.getElementById('purchase');

    if (purchaseSelect) {
        // Attach the 'change' event listener
        purchaseSelect.addEventListener('change', function() {
            // Your existing 'change' event handling code here
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Get references to the select boxes and other input fields
        var purchaseSelect = document.getElementById('purchase');
        var totalInput = document.getElementById('total');
        // Add more references for other fields as needed

        // Add a change event listener to the 'purchase' select box
        purchaseSelect.addEventListener('change', function() {
            // Get the selected value
            var selectedPurchaseId = purchaseSelect.value;

            // Make an XMLHttpRequest to fetch data based on the selected purchase ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/getPurchaseDetails/' + selectedPurchaseId, true); // Replace with your actual route
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse the JSON response
                    var responseData = JSON.parse(xhr.responseText);

                    // Populate the relevant fields with the retrieved data
                    totalInput.value = responseData.total;
                    // Add more fields as needed

                    // You can also update other fields based on the fetched data
                }
            };
            xhr.send();
        });
    });
</script>



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