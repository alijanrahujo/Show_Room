<div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vehicle Detail</h5>
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
                                {!! Form::label('Vehicle Type', 'Vehicle Type *') !!}
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
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Vehicle', 'Vehicle *') !!}
                                {!! Form::select('purchase_id', $purchases, null, [
                                    'wire:model.live' => 'purchase_id',
                                    'placeholder' => 'Select',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('purchase_id')
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
                                    'placeholder' => 'Engine Number',
                                ]) !!}
                                @error('engine')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title', 'Title *') !!}
                                {!! Form::text('title', null, [
                                    'wire:model' => 'title',
                                    'class' => 'form-control',
                                    'placeholder' => 'Example CD 70 CD 125',
                                ]) !!}
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('chassis', 'Chassis Number *') !!}
                                {!! Form::text('chassis', null, [
                                    'wire:model' => 'chassis',
                                    'class' => 'form-control',
                                    'placeholder' => 'Chassis Number',
                                ]) !!}
                                @error('chassis')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                    'placeholder' => 'Color',
                                ]) !!}
                                @error('color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('horse_power', 'Horse Power *') !!}
                                {!! Form::text('horse_power', null, [
                                    'wire:model' => 'horse_power',
                                    'class' => 'form-control',
                                    'placeholder' => 'Horse Power',
                                ]) !!}
                                @error('horse_power')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                    'placeholder' => 'Register No',
                                ]) !!}
                                @error('register_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
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
                                @error('owner_cnic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner_name', 'Owner Name *') !!}
                                {!! Form::text('owner_name', null, [
                                    'wire:model' => 'owner_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Owner Name',
                                ]) !!}
                                @error('owner_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner_father', 'Owner Father *') !!}
                                {!! Form::text('owner_father', null, [
                                    'wire:model' => 'owner_father',
                                    'class' => 'form-control',
                                    'placeholder' => 'Owner Father',
                                ]) !!}
                                @error('owner_father')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner_address', 'Owner Address *') !!}
                                {!! Form::text('owner_address', null, [
                                    'wire:model' => 'owner_address',
                                    'class' => 'form-control',
                                    'placeholder' => 'Owner Address',
                                ]) !!}
                                @error('owner_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h4 class="card-title">Buyer Detail</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('cnic', 'Buyer CNIC') !!}
                                {!! Form::text('cnic', null, [
                                    'wire:model.blur' => 'cnic',
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
                                {!! Form::label('phone', 'Phone Number *') !!}
                                {!! Form::text('phone', null, [
                                    'wire:model' => 'phone',
                                    // 'wire:blur' => 'updatephone',
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
                                {!! Form::label('customer_name', 'Buyer Name *') !!}
                                {!! Form::text('customer_name', null, [
                                    'wire:model' => 'customer_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Buyer Name',
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
                                {!! Form::label('address', 'Buyer Address') !!}
                                {!! Form::text('address', null, [
                                    'wire:model' => 'address',
                                    'class' => 'form-control',
                                    'placeholder' => 'Buyer Address',
                                ]) !!}
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h4>Guarantor Details</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('guarantor_name', 'Guarantor Name *') !!}
                                {!! Form::text('guarantor_name', null, [
                                    'wire:model' => 'guarantor_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Guarantor Name',
                                ]) !!}
                                @error('guarantor_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('guarantor_father', 'Guarantor Father *') !!}
                                {!! Form::text('guarantor_father', null, [
                                    'wire:model' => 'guarantor_father',
                                    'class' => 'form-control',
                                    'placeholder' => 'Guarantor Father',
                                ]) !!}
                                @error('guarantor_father')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payment Detail</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('total', 'Total Amount *') !!}
                                {!! Form::number('total', null, [
                                    'wire:model' => 'total',
                                    'class' => 'form-control',
                                    'placeholder' => 'Total Amount',
                                ]) !!}
                                @error('total')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('installment', 'installment *') !!}
                                {!! Form::select('installment', ['Yes' => 'Yes', 'No' => 'No'], null, [
                                    'wire:model.live' => 'installment',
                                    'placeholder' => 'Select',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('installment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if ($installment == 'Yes')
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('months', 'Months *') !!}
                                    {!! Form::number('months', null, [
                                        'wire:model' => 'months',
                                        'class' => 'form-control',
                                        'placeholder' => 'Months',
                                    ]) !!}
                                    @error('months')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        @if ($installment == 'Yes')
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('down_payment_amount', 'Down payment amount *') !!}
                                    {!! Form::number('down_payment_amount', null, [
                                        'wire:model.live' => 'down_payment_amount',
                                        'class' => 'form-control',
                                        'placeholder' => 'Down payment amount',
                                    ]) !!}
                                    @error('down_payment_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('date', 'Date *') !!}
                            {!! Form::date('date', null, [
                                'wire:model' => 'date',
                                'class' => 'form-control',
                                'placeholder' => 'Select Date',
                            ]) !!}
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('time', 'Time *') !!}
                            {!! Form::time('time', null, [
                                'wire:model' => 'time',
                                'class' => 'form-control',
                                'placeholder' => 'Select Time',
                            ]) !!}
                            @error('time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
</div>
