@extends('layouts.web')
@section('title', 'Leadger Report')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Reports</a></li>
                            <li class="breadcrumb-item active">Leadger Report</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Employee list</h4> -->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open([
                            'route' => 'reports.PurchaseNew',
                            'method' => 'post',
                            'class' => 'parsley-examples',
                            'novalidate' => '',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        <div class="row" id="dynamic-fields">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('customer', 'Customer') !!}
                                    {!! Form::select(
                                        'customer',
                                        $customers,
                                        ['all' => 'all'],
                                        [
                                            'placeholder' => 'Select',
                                            'class' => 'form-control',
                                            'id' => 'status',
                                        ],
                                    ) !!}
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <input type="hidden" name="table" value="purchase">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        @if (isset($ledgers))
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Account Holder</th>
                                            <th>Particular</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($ledgers as $leadger)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $leadger->date }} </td>
                                                <td> {{ $leadger->account_holder }} </td>
                                                <td> {{ $leadger->particulars }} </td>
                                                <td> {{ $leadger->debit }} </td>
                                                <td> {{ $leadger->credit }} </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        @endif

    </div><!-- container -->
@endsection
@section('style')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
