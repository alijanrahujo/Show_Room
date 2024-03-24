<div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vehicle Detail</h5>
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
                                {!! Form::label('chassis', 'Chassis *') !!}
                                {!! Form::text('chassis', null, [
                                    'class' => 'form-control',
                                    'wire:model.blur' => 'chassis',
                                    'id' => 'chassis',
                                    'placeholder' => 'Enter chassis',
                                ]) !!}
                                @error('chassis')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('engine', 'Engine *') !!}
                                {!! Form::text('engine', null, [
                                    'wire:model' => 'engine',
                                    'class' => 'form-control',
                                    'id' => 'engine',
                                    'placeholder' => 'Enter engine',
                                ]) !!}
                                @error('engine')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('vehicle_id', 'Vehicle *') !!}
                                {!! Form::select('vehicle_id', $vehicles, null, [
                                    'wire:model' => 'vehicle_id',
                                    'wire:model.live' => 'vehicle_id',
                                    'placeholder' => 'Select',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('vehicle_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('horse_power', 'Horse Power *') !!}
                                {!! Form::text('horse_power', null, [
                                    'wire:model' => 'horse_power',
                                    'class' => 'form-control',
                                    'id' => 'horse_power',
                                    'placeholder' => 'Enter horse power',
                                ]) !!}
                                @error('horse_power')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('model', 'Model *') !!}
                                {!! Form::text('model', null, [
                                    'wire:model' => 'model',
                                    'class' => 'form-control',
                                    'id' => 'model',
                                    'placeholder' => 'Enter model',
                                ]) !!}
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('color', 'Color *') !!}
                                {!! Form::text('color', null, [
                                    'wire:model' => 'color',
                                    'class' => 'form-control',
                                    'id' => 'color',
                                    'placeholder' => 'Enter color',
                                ]) !!}
                                @error('color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer Detail</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('cnic', 'Customer CNIC') !!}
                                {!! Form::text('cnic', null, [
                                    'wire:model' => 'cnic',
                                    'wire:model.blur' => 'cnic',
                                    'class' => 'form-control',
                                    'placeholder' => 'Customer CNIC',
                                ]) !!}
                                @error('cnic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone Number *') !!}
                                {!! Form::text('phone', null, [
                                    'wire:model' => 'phone',
                                    'class' => 'form-control',
                                    'placeholder' => 'Phone Number',
                                ]) !!}
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Customer Name *') !!}
                                {!! Form::text('name', null, [
                                    'wire:model' => 'name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Customer Name',
                                ]) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('father_name', 'Father Name *') !!}
                                {!! Form::text('father_name', null, [
                                    'wire:model' => 'father_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Father Name',
                                ]) !!}
                                @error('father_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('address', 'Customer Address') !!}
                                {!! Form::text('address', null, [
                                    'wire:model' => 'address',
                                    'class' => 'form-control',
                                    'placeholder' => 'Customer Address',
                                ]) !!}
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reference Detail</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('refrence', 'Cnic') !!}
                                {!! Form::text('refrence', null, [
                                    'wire:model.blur' => 'refrence',
                                    'class' => 'form-control',
                                    'id' => 'refrence',
                                    'placeholder' => 'Enter cnic',
                                ]) !!}
                                @error('refrence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ref_phone', 'Phone') !!}
                                {!! Form::text('ref_phone', null, [
                                    'wire:model' => 'ref_phone',
                                    'class' => 'form-control',
                                    'id' => 'ref_phone',
                                    'placeholder' => 'Enter phone',
                                ]) !!}
                                @error('ref_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ref_name', 'Reference Name') !!}
                                {!! Form::text('ref_name', null, [
                                    'wire:model' => 'ref_name',
                                    'class' => 'form-control',
                                    'id' => 'ref_name',
                                    'placeholder' => 'Enter reference Name',
                                ]) !!}
                                @error('ref_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ref_father', 'Father Name') !!}
                                {!! Form::text('ref_father', null, [
                                    'wire:model' => 'ref_father',
                                    'class' => 'form-control',
                                    'id' => 'ref_father',
                                    'placeholder' => 'Enter father name',
                                ]) !!}
                                @error('ref_father')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('ref_address', 'Address') !!}
                                {!! Form::text('ref_address', null, [
                                    'wire:model' => 'ref_address',
                                    'class' => 'form-control',
                                    'id' => 'ref_address',
                                    'placeholder' => 'Enter address',
                                ]) !!}
                                @error('ref_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Delivery Detail</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('date', 'Date *') !!}
                                {!! Form::date('date', null, ['wire:model' => 'date', 'class' => 'form-control', 'id' => 'date']) !!}
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('type', 'Type *') !!}
                                {!! Form::select('type', ['Registration' => 'Registration', 'Plate' => 'Plate No', 'Letter' => 'Letter'], null, [
                                    'wire:model.live' => 'type',
                                    'placeholder' => 'Select',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('type')
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
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('payment', 'Payment *') !!}
                                {!! Form::number('payment', null, [
                                    'wire:model' => 'payment',
                                    'class' => 'form-control',
                                    'id' => 'payment',
                                    'placeholder' => 'Enter Registration',
                                ]) !!}
                                @error('payment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('description', 'Description') !!}
                                {!! Form::text('description', null, [
                                    'class' => 'form-control',
                                    'wire:model' => 'description',
                                    'id' => 'description',
                                    'placeholder' => 'Enter Description',
                                ]) !!}
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('file', 'File') !!}
                                {!! Form::file('file', [
                                    'class' => 'form-control',
                                    'wire:model' => 'file',
                                    'id' => 'file',
                                    'placeholder' => 'Enter file',
                                ]) !!}
                                @error('file')
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

                    {!! Form::close() !!}
                </div>
            </div>
        </div><!--end col-->
    </div>
</div>
