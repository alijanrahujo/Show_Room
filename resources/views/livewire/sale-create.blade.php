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
</div><!--end col-->