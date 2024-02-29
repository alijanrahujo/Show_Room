@extends('layouts.web')
@section('title','Purchases')

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
                        <li class="breadcrumb-item active">Purchase list</li>
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

                    <h4 class="mt-0 header-title clearfix">
                        <div>
                            <a href="{{Route('purchases.create')}}" class="btn btn-primary float-right">Purchase Bike</a>
                        </div>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Enging</th>
                                    <th>Chaches</th>
                                    <th>Color</th>
                                    <th>Model</th>
                                    <th>Total Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{$payment->paymentable->title}} </td>
                                    <td> {{$payment->paymentable->engine}} </td>
                                    <td> {{$payment->paymentable->chassis}} </td>
                                    <td> {{$payment->paymentable->color}} </td>
                                    <td> {{$payment->paymentable->model}} </td>
                                    <td> {{$payment->total}} </td>
                                    <td> {{$payment->received}} </td>
                                    <td> {{$payment->pending}} </td>
                                    <td> {{$payment->status}} </td>
                                    <td> {{$payment->date}} </td>
                                    <td>
                                        <a href="{{Route('payments.show',$payment->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        {{-- <a href="{{Route('payments.edit',$payment->id)}}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a> --}}
                                        {{-- {!! Form::open(['method' => 'DELETE','route' => ['payments.destroy', $payment->id],'style'=>'display:inline']) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger btn-xs'] ) !!}
                                        {!! Form::close() !!} --}}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

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
