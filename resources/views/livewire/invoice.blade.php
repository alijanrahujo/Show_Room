<div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vehicle Detail</h4>
                    {!! Form::open([
                        'wire:submit.prevent' => 'submit',
                        'method' => 'post',
                        'class' => 'parsley-examples',
                        'novalidate' => '',
                        'enctype' => 'multipart/form-data',
                    ]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('chassis', 'Chassis Number *') !!}
                                {!! Form::text('chassis', null, [
                                    'wire:model.blur' => 'chassis',
                                    'class' => 'form-control',
                                    'id' => 'chassis',
                                    'placeholder' => 'Chassis Number',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('vehicle_id', 'Vehicle *') !!}
                                {!! Form::select('vehicle_id', $vehicles, null, [
                                    'wire:model.live' => 'vehicle_id',
                                    'placeholder' => 'Select',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('vehicle_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('engine', 'Engine Number *') !!}
                                {!! Form::text('engine', null, [
                                    'wire:model' => 'engine',
                                    'class' => 'form-control',
                                    'id' => 'engine',
                                    'placeholder' => 'Engine Number',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('model', 'Model *') !!}
                                {!! Form::text('model', null, [
                                    'wire:model' => 'model',
                                    'class' => 'form-control',
                                    'id' => 'model',
                                    'placeholder' => 'Model',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('color', 'Color *') !!}
                                {!! Form::text('color', null, [
                                    'wire:model' => 'color',
                                    'class' => 'form-control',
                                    'id' => 'color',
                                    'placeholder' => 'Color',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('horse_power', 'Horse Power *') !!}
                                {!! Form::text('horse_power', null, [
                                    'wire:model' => 'horse_power',
                                    'class' => 'form-control',
                                    'id' => 'horse_power',
                                    'placeholder' => 'Horse Power',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('maker', 'Maker *') !!}
                                {!! Form::select('maker', ['Honda' => 'Honda', 'China' => 'China'], null, [
                                    'wire:model' => 'maker',
                                    'class' => 'form-control',
                                    'id' => 'maker',
                                    'placeholder' => 'Maker',
                                ]) !!}

                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <h4>Buyer Details</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('buyer_cnic', 'Buyer CNIC') !!}
                                {!! Form::text('buyer_cnic', null, [
                                    'wire:model' => 'buyer_cnic',
                                    'class' => 'form-control',
                                    'placeholder' => 'Buyer CNIC',
                                ]) !!}
                                @error('cnic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('buyer_phone', 'Phone Number *') !!}
                                {!! Form::text('buyer_phone', null, [
                                    'wire:model' => 'buyer_phone',
                                    'class' => 'form-control',
                                    'placeholder' => 'Phone Number',
                                ]) !!}
                                @error('buyer_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('buyer_name', 'Buyer Name *') !!}
                                {!! Form::text('buyer_name', null, [
                                    'wire:model' => 'buyer_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Buyer Name',
                                ]) !!}
                                @error('buyer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('buyer_father', 'Father Name *') !!}
                                {!! Form::text('buyer_father', null, [
                                    'wire:model' => 'buyer_father',
                                    'class' => 'form-control',
                                    'placeholder' => 'Father Name',
                                ]) !!}
                                @error('buyer_father')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('buyer_address', 'Buyer Address') !!}
                                {!! Form::text('buyer_address', null, [
                                    'wire:model' => 'buyer_address',
                                    'class' => 'form-control',
                                    'placeholder' => 'Buyer Address',
                                ]) !!}
                                @error('buyer_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('date', 'date') !!}
                                {!! Form::date('date', null, [
                                    'wire:model' => 'date',
                                    'class' => 'form-control',
                                    'placeholder' => 'Buyer Address',
                                ]) !!}
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('status', 'Status *') !!}
                                {!! Form::select('status', ['9' => 'Issued', '10' => 'Not Issued'], null, [
                                    'wire:model' => 'status',
                                    'placeholder' => 'Select',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('status')
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
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
