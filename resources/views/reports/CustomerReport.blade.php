@extends('layouts.web')
@section('title', 'Customer Report')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Customer Report</a></li>
                        <li class="breadcrumb-item active">Report</li>
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
                            {{-- <a href="{{ Route('reports.create') }}" class="btn btn-primary float-right">Add Vehicle
                            Type</a> --}}
                        </div>
                    </h4>
                    <form action="{{ Route('reports.CustomerReport') }}" method="GET">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="customer">Customer:</label>
                                <select id="customer" name="customer" class="form-control">
                                    <Option value="">All</Option>
                                    @foreach($customers as $customer)
                                    <Option>{{$customer->customer_name}}</Option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="to_date">Report type:</label>
                                <select id="report_type" name="report_type" class="form-control">
                                    <Option selected>All</Option>
                                    <Option>New Purchase </Option>
                                    <Option>New Sell</Option>
                                    <Option>Used purchase</Option>
                                    <Option>Used Sell</Option>

                                    
                                </select>
                            </div>
                            <div class="col-md-3 mt-4">
                                <button type="submit" class="btn btn-primary">Report</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Purchase Report</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Cnic</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr>
                                    <td>{{$report}}</td>
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