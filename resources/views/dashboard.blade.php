@extends('layouts.web')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="title-text mt-0">Customer</h4>
                                <h3 class="font-weight-semibold mb-1">{{ $data['customer'] }}</h3>
                                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p> --}}
                            </div><!--end col-->
                            <div class="col-4 text-center align-self-center">
                                <!-- <span class="card-eco-icon">👳🏻</span> -->
                                <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                            </div> <!--end col-->
                        </div> <!--end row-->
                        <div class="bg-pattern"></div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="title-text mt-0">{{ date('F') }} Customer</h4>
                                <h3 class="font-weight-semibold mb-1">{{ $data['new_customer'] }}</h3>
                                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p> --}}
                            </div><!--end col-->
                            <div class="col-4 text-center align-self-center">
                                <!-- <span class="card-eco-icon">👳🏻</span> -->
                                <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                            </div> <!--end col-->
                        </div> <!--end row-->
                        <div class="bg-pattern"></div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="title-text mt-0">New Bikes</h4>
                                <h3 class="font-weight-semibold mb-1">{{ $data['new_bike'] }}</h3>
                                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p> --}}
                            </div><!--end col-->
                            <div class="col-4 text-center align-self-center">
                                <!-- <span class="card-eco-icon">🛒</span> -->
                                <i class="dripicons-cart card-eco-icon  align-self-center"></i>
                            </div> <!--end col-->
                        </div> <!--end row-->
                        <div class="bg-pattern"></div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="title-text mt-0">Used Bikes</h4>
                                <h3 class="font-weight-semibold mb-1">{{ $data['used_bike'] }}</h3>
                                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p> --}}
                            </div><!--end col-->
                            <div class="col-4 text-center align-self-center">
                                <!-- <span class="card-eco-icon">🎲</span> -->
                                <i class="dripicons-jewel card-eco-icon  align-self-center"></i>
                            </div> <!--end col-->
                        </div> <!--end row-->
                        <div class="bg-pattern"></div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Due Date</th>
                                    <th>Installment Amont</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($installments as $installment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $installment->installmentable->customer->customer_name }}</td>
                                        <td>{{ $installment->installmentable->customer->phone }}</td>
                                        <td>{{ $installment->date }}</td>
                                        <td>{{ $installment->amount }}</td>
                                        <td>{{ status($installment->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
@endsection
