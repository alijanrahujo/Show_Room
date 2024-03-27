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
                            <li class="breadcrumb-item active">Registration Detail</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Sale Detail</h4> -->
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
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Registrations</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::model($register, [
                                                    'enctype' => 'multipart/form-data',
                                                    'method' => 'PATCH',
                                                    'route' => ['registration.imageUpdate', $register->id],
                                                ]) !!}

                                                <div class="row" id="dynamic-fields">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('date', 'Date *') !!}
                                                            {!! Form::date('date', null, [
                                                                'wire:model' => 'date',
                                                                'readonly' => 'readonly',
                                                                'class' => 'form-control',
                                                                'id' => 'date',
                                                            ]) !!}
                                                            @error('date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('type', 'Type *') !!}
                                                            {!! Form::select(
                                                                'type',
                                                                ['Registration' => 'Registration', 'Plate' => 'Plate No', 'Letter' => 'Letter'],
                                                                $register->type,
                                                                [
                                                                    'placeholder' => 'Select',
                                                                    'class' => 'form-control',
                                                                    'disabled' => 'disabled',
                                                                ],
                                                            ) !!}
                                                            @error('type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('payment', 'Payment *') !!}
                                                            {!! Form::number('payment', null, [
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Enter Payment',
                                                                'readonly' => 'readonly',
                                                            ]) !!}
                                                            @error('payment')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('paid', 'Paid Amount*') !!}
                                                            {!! Form::number('paid', null, [
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Enter paid amount',
                                                            ]) !!}
                                                            @error('paid')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('cash', 'Cash Type *') !!}
                                                            {!! Form::select('cash', ['Cash' => 'Cash', 'Online' => 'Online'], null, [
                                                                'class' => 'form-control',
                                                            ]) !!}
                                                            @error('cash')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('status', 'Status *') !!}
                                                            {!! Form::select('status', ['8' => 'Inprocess', '9' => 'Issued', '10' => 'Not Issued'], $register->status, [
                                                                'placeholder' => 'Select',
                                                                'class' => 'form-control',
                                                                'readonly' => 'readonly',
                                                            ]) !!}
                                                            @error('status')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {!! Form::label('descrpriton', 'descrpriton*') !!}
                                                            {!! Form::textarea('description', null, [
                                                                'class' => 'form-control',
                                                                'id' => 'description',
                                                            ]) !!}
                                                            <small id="emailHelp" class="form-text text-muted"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <img id="captured_image" src="" alt="Captured Image">
                                                        <input type="hidden" name="image" class="image-tag">
                                                        <br>
                                                        <button type="button" class="btn btn-success my-4"
                                                            data-toggle="modal" data-target="#imageModal">
                                                            Take Picture
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                    aria-labelledby="imageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="m-auto" id="my_camera"></div>
                                                        <br />
                                                        <input type=button value="Take Snapshot" onClick="take_snapshot()"
                                                            class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
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
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <style>
        #captured_image {
            width: 100%;
        }

        .modal-body {
            max-height: calc(100vh - 200px);
            /* Adjust height as needed */
            overflow-y: auto;
        }

        /* Hide the default scrollbar */
        .modal-body::-webkit-scrollbar {
            display: none;
        }

        /* Style the custom scrollbar */
        .modal-body {
            scrollbar-width: thin;
            /* "auto" or "thin" for Firefox */
            scrollbar-color: #888888 #f0f0f0;
            /* thumb color and track color */
        }

        /* Style the thumb of the custom scrollbar */
        .modal-body::-webkit-scrollbar-thumb {
            background-color: #888888;
            /* color of the scrollbar thumb */
        }

        /* Style the track of the custom scrollbar */
        .modal-body::-webkit-scrollbar-track {
            background-color: #f0f0f0;
            /* color of the scrollbar track */
        }
    </style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script language="JavaScript">
        $('#exampleModal').modal('show');

        Webcam.set({
            width: 470,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 1000
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                $("#captured_image").attr('src', data_uri);
                $('#imageModal').modal('hide');
            });
        }
    </script>
    <script>
        function validatePayment(input) {
            var pendingAmount = parseFloat(document.getElementById('pending').value);
            var payingAmount = parseFloat(input.value);

            if (payingAmount > pendingAmount) {
                input.value = pendingAmount;
            }
        }
    </script>
@endsection
