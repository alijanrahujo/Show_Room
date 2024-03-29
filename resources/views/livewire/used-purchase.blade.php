<div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vehicle Detail</h4>
                    {!! Form::open([
                        'wire:submit' => 'submit',
                        'route' => 'purchases.store',
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('register_no', 'Register No *') !!}
                                {!! Form::text('register_no', null, [
                                    'wire:model' => 'register_no',
                                    'class' => 'form-control',
                                    'id' => 'register_no',
                                    'placeholder' => 'Register No',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4>Seller Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('cnic', 'Seller CNIC') !!}
                                {!! Form::text('cnic', null, [
                                    'wire:model.blur' => 'cnic',
                                    'class' => 'form-control',
                                    'placeholder' => 'Seller CNIC',
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
                                    'wire:model.blur' => 'phone',
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
                                {{ $extra }}
                                {!! Form::label('customer_name', 'Seller Name *') !!}
                                {!! Form::text('customer_name', null, [
                                    'wire:model.blur' => 'customer_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Seller Name',
                                ]) !!}
                                @error('customer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('father_name', 'Father Name *') !!}
                                {!! Form::text('father_name', null, [
                                    'wire:model.blur' => 'father_name',
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
                                {!! Form::label('address', 'Seller Address') !!}
                                {!! Form::text('address', null, [
                                    'wire:model.blur' => 'address',
                                    'class' => 'form-control',
                                    'placeholder' => 'Seller Address',
                                ]) !!}
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h4 class="card-title">Owner Detail</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner_cnic', 'Owner CNIC *') !!}
                                {!! Form::text('owner_cnic', null, [
                                    'wire:model.blur' => 'owner_cnic',
                                    'class' => 'form-control',
                                    'placeholder' => 'Owner CNIC',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner_phone', 'Owner Phone *') !!}
                                {!! Form::text('owner_phone', null, [
                                    'wire:model.blur' => 'owner_phone',
                                    'class' => 'form-control',
                                    'placeholder' => 'Owner Phone',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner_name', 'Owner Name *') !!}
                                {!! Form::text('owner_name', null, [
                                    'wire:model' => 'owner_name',
                                    'class' => 'form-control',
                                    'id' => 'owner_name',
                                    'placeholder' => 'Owner Name',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner_father', 'Owner Father *') !!}
                                {!! Form::text('owner_father', null, [
                                    'wire:model' => 'owner_father',
                                    'class' => 'form-control',
                                    'id' => 'owner_father',
                                    'placeholder' => 'Owner Father',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('owner_address', 'Owner Address *') !!}
                                {!! Form::text('owner_address', null, [
                                    'wire:model' => 'owner_address',
                                    'class' => 'form-control',
                                    'id' => 'owner_address',
                                    'placeholder' => 'Owner Address',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payment Detail</h5>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('Date', 'Date *') !!}
                            {!! Form::date('date', null, [
                                'class' => 'form-control',
                                'wire:model' => 'date',
                                'id' => 'Date',
                                'placeholder' => 'Date Amount',
                            ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('Time', 'Time *') !!}
                            {!! Form::time('time', \Carbon\Carbon::now()->format('H:i'), [
                                'class' => 'form-control',
                                'id' => 'Time',
                                'wire:model' => 'time',
                                'placeholder' => 'Select Time',
                            ]) !!}
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total_amount', 'Total Amount *') !!}
                                {!! Form::number('total_amount', null, [
                                    'wire:model' => 'total_amount',
                                    'class' => 'form-control',
                                    'placeholder' => 'Total Amount',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('paid', 'Paid Amount*') !!}
                                {!! Form::number('paid', null, [
                                    'wire:model' => 'paid',
                                    'class' => 'form-control',
                                    'wire:model' => 'paid',
                                    'placeholder' => 'paid Amount',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>

        </div><!--end card-->
    </div><!--end col-->
</div>
