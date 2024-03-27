@extends('layouts.web')
@section('title', 'Purchases')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Purchases</a></li>
                            <li class="breadcrumb-item active">Purchase Detail</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Purcahse Detail</h4> -->
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
                                    <li class="nav-item"><a class="nav-link active" id="purchase_detail_tab"
                                            data-toggle="pill" href="#purchase_detail">Purchase Detail</a></li>
                                    <li class="nav-item"><a class="nav-link" id="activity_detail_tab" data-toggle="pill"
                                            href="#activity_detail">{{ $purchase->purchaseable->customer_name ?? '' ? 'Seller & Owner' : 'Dealer' }}</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="payment_detail_tab" data-toggle="pill"
                                            href="#payment_detail">Payment Detail</a></li>
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
                    <div class="tab-pane fade active show" id="purchase_detail">
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
                                                            <table class="table table-striped-columns">
                                                                <tr class="h5">
                                                                    <th>Title</th>
                                                                    <td>{{ $purchase->purchaseDetail[0]->title ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Engine</th>
                                                                    <td>{{ $purchase->purchaseDetail[0]->engine ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Chassis </th>
                                                                    <td>{{ $purchase->purchaseDetail[0]->chassis ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Color </th>
                                                                    <td>{{ $purchase->purchaseDetail[0]->color ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Model</th>
                                                                    <td>{{ $purchase->purchaseDetail[0]->model ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Purchase Amount</th>
                                                                    <td>{{ $purchase->total_amount ?? 0 }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Received Amount</th>
                                                                    <td>{{ $purchase->payments->sum('received') ?? 0 }}</td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Due Amount </th>
                                                                    <td>{{ ($purchase->total_amount ?? 0) - ($purchase->payments->sum('received') ?? 0) ?? 0 }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="h5">
                                                                    <th>Status</th>
                                                                    <td>{!! $purchase->status !!}
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
                    <!--end general detail-->
                    <div class="tab-pane fade" id="activity_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 bg-white">
                                                <div class="tab-content" id="files-tabContent">
                                                    <div class="tab-pane fade show active" id="files-pdf">
                                                        <h4 class="mt-0 header-title mb-3">Seller Detail</h4>
                                                        <div class="file-box-content">
                                                            <table class="table table-striped-columns">
                                                                <tr class="h5">
                                                                    <th>{{ $purchase->purchaseable->customer_name ?? '' ? 'Seller' : 'Dealer' }}
                                                                        Name</th>
                                                                    <td>{{ $purchase->purchaseable->customer_name ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ $purchase->purchaseable->customer_name ?? '' ? 'Seller' : 'Dealer' }}
                                                                        Phone</th>
                                                                    <td>{{ $purchase->purchaseable->phone ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ $purchase->purchaseable->customer_name ?? '' ? 'Seller' : 'Dealer' }}
                                                                        Cnic</th>
                                                                    <td>{{ $purchase->purchaseable->cnic ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td>{{ $purchase->purchaseable->address ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <h4 class="mt-5 header-title mb-3">Owner Detail</h4>
                                                        <div class="file-box-content">
                                                            <table class="table table-striped-columns">
                                                                <tr class="h5">
                                                                    <th>Owner Name</th>
                                                                    <td>{{ $detail->owner_name ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Owner Phone</th>
                                                                    <td>{{ $detail->owner_phone ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Owner Cnic</th>
                                                                    <td>{{ $detail->owner_cnic ?? 'Not Available' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td>{{ $detail->owner_address ?? 'Not Available' }}
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
                            </div><!--end row-->
                        </div><!--end education detail-->
                    </div><!--end tab-content-->
                    <div class="tab-pane fade" id="payment_detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($purchase->due_amount == 0)
                                        @else
                                            <button type="button" class="mb-3 float-right btn btn-primary"
                                                data-toggle="modal" data-target="#exampleModal"
                                                data-whatever="@mdo">Add</button>
                                        @endif
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::open([
                                                            'route' => 'payments.store',
                                                            'method' => 'post',
                                                            'class' => 'parsley-examples',
                                                            'novalidate' => '',
                                                            'enctype' => 'multipart/form-data',
                                                        ]) !!}
                                                        <div class="row" id="dynamic-fields">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('pending', 'Pending*') !!}
                                                                    {!! Form::text('pending', $purchase->payments()->sum('pending'), [
                                                                        'class' => 'form-control',
                                                                        'readonly' => 'readonly',
                                                                        'placeholder' => 'Enter pending',
                                                                    ]) !!}
                                                                    @error('pending')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('paid', 'Paying Amount*') !!}
                                                                    {!! Form::text('paid', null, ['class' => 'form-control', 'placeholder' => 'Enter paid']) !!}
                                                                    @error('paid')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('date', 'Date *') !!}
                                                                    {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Enter date']) !!}
                                                                    @error('date')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('type', 'Type *') !!}
                                                                    {!! Form::select('type', ['Cash' => 'Cash', 'Online' => 'online'], null, [
                                                                        'class' => 'form-control',
                                                                        'id' => 'type',
                                                                    ]) !!}
                                                                    @error('type')
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
                                                                    @error('description')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                <img id="captured_image" src=""
                                                                    alt="Captured Image">
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
                                                                    <input type="hidden" name="purchase_id"
                                                                        value="{{ $purchase->id }}">
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
                                                                <input type=button value="Take Snapshot"
                                                                    onClick="take_snapshot()" class="btn btn-primary">
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
                                        <table class="table table-striped-columns">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Received Amount</th>
                                                    <th>Due Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->date }}</td>
                                                        <td>{{ $payment->type }}</td>
                                                        <td>{{ $payment->total }}</td>
                                                        <td>{{ $payment->received }}</td>
                                                        <td>{{ $payment->pending }}</td>
                                                        <td>{!! $payment->status !!}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end portfolio detail-->
                </div>
                <!--end tab-content-->
            </div>
        </div>
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
@endsection
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
@endsection
