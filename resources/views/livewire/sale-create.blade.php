{{-- <div class="row mt-4">
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
                            {!! Form::label('bike', 'bike *') !!}
                            {!! Form::select('bike',$purchases,null, array('wire:model.live'=>'purchase','placeholder' => 'Select','class' => 'form-control','id'=>'customer')) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('title', 'Title *') !!}
                            {!! Form::text('title', null, ['wire:model'=>'title','class' => 'form-control', 'id' => 'title', 'placeholder' => 'Example CD 70 CD 125']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('eng', 'Engine Number *') !!}
                            {!! Form::text('engine', null, ['wire:model'=>'engine','class' => 'form-control', 'id' => 'eng', 'placeholder' => 'Engine Number']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('chassis', 'Chassis Number *') !!}
                            {!! Form::text('chassis', null, ['wire:model'=>'chassis','class' => 'form-control', 'id' => 'chassis', 'placeholder' => 'Chassis Number']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('model', 'Model *') !!}
                            {!! Form::text('model', null, ['wire:model'=>'model','class' => 'form-control', 'id' => 'model', 'placeholder' => 'Model']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('color', 'Color *') !!}
                            {!! Form::text('color', null, ['wire:model'=>'color','class' => 'form-control', 'id' => 'color', 'placeholder' => 'Color']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('purchase_amount', 'Purchase Amount *') !!}
                            {!! Form::number('purchase_amount', null, ['wire:model'=>'purchase_amount','class' => 'form-control', 'min'=>'10000', 'id' => 'purchase_amount','readonly', 'placeholder' => 'Purchase Amount']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('status', 'Status *') !!}
                            {!! Form::select('status',['1'=>'Active','0'=>'Deactive'], null, array('placeholder' => 'Select','class' => 'form-control','id'=>'status')) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('sell', 'Sale Amount *') !!}
                            {!! Form::number('sell', null, ['class' => 'form-control', 'min'=>'10000', 'id' => 'sell', 'placeholder' => 'sell Amount']) !!}
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
</div><!--end col--> --}}


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
                <h4>Customer Details</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('cnic', 'Customer Cnic') !!}
                            {!! Form::text('cnic', null, ['wire:model'=>'cnic','wire:blur'=>'updatecnic','class' => 'form-control', 'id' => 'cnic', 'placeholder' => 'Customer Cnic']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone Number *') !!}
                            {!! Form::text('phone', null, ['wire:model'=>'phone', 'wire:blur'=>'updatephone','class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone Number']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('customer', 'Customer Name *') !!}
                            {!! Form::text('customer', null, ['wire:model'=>'customer','class' => 'form-control', 'id' => 'customer', 'placeholder' => 'Customer Name']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('father', 'Father Name *') !!}
                            {!! Form::text('father', null, ['wire:model'=>'father','class' => 'form-control', 'id' => 'father', 'placeholder' => 'Father Name']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('address', 'Customer Address') !!}
                            {!! Form::text('address', null, ['wire:model'=>'address','class' => 'form-control', 'id' => 'address', 'placeholder' => 'Customer Address']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <h4>Vehicle Details</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('Vehicle Type', 'Vehicle Type *') !!}
                            {!! Form::select('vehicle_id',$vehicles, null, array('wire:model.live'=>'vehicle_id','placeholder' => 'Select','class' => 'form-control','id'=>'status')) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('Vehicle', 'Vehicle *') !!}
                            {!! Form::select('purchase_id',$purchases, null, array('wire:model'=>'purchase_id','placeholder' => 'Select','class' => 'form-control','id'=>'status')) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <br/>
                        {!! Form::button('add', ['wire:click'=>'addrecord','class' => 'btn btn-primary mt-2 btn-block']) !!}
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Enging</th>
                                <th>Chaches</th>
                                <th>Color</th>
                                <th>Model</th>
                                <th>Purchased Amount</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($purchased as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td> {{$value->title}} </td>
                                <td> {{$value->engine}} </td>
                                <td> {{$value->chassis}} </td>
                                <td> {{$value->color}} </td>
                                <td> {{$value->model}} </td>
                                <td> {{$value->payments()->sum('total')}} </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
