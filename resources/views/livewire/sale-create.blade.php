<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open([
                    'wire:submit' => 'submit',
                    'route' => 'sales.store',
                    'method' => 'post',
                    'class' => 'parsley-examples',
                    'novalidate' => '',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <h4>Customer Details</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('cnic', 'Customer CNIC') !!}
                            {!! Form::text('cnic', null, [
                                'wire:model' => 'cnic',
                                'wire:blur' => 'updatecnic',
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
                            {!! Form::label('customer', 'Customer Name *') !!}
                            {!! Form::text('customer', null, [
                                'wire:model' => 'customer',
                                'class' => 'form-control',
                                'placeholder' => 'Customer Name',
                            ]) !!}
                            @error('customer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('father', 'Father Name *') !!}
                            {!! Form::text('father', null, [
                                'wire:model' => 'father',
                                'class' => 'form-control',
                                'placeholder' => 'Father Name',
                            ]) !!}
                            @error('father')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('date', 'Date') !!}
                            {!! Form::date('date', null, [
                                'wire:model' => 'date',
                                'class' => 'form-control',
                                'placeholder' => 'date',
                            ]) !!}
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Vehicle Details</h4>
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
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('tax', 'Tax *') !!}
                            {!! Form::select('tax', ['Yes' => 'Yes', 'No' => 'No'], null, [
                                'wire:model.live' => 'tax',
                                'placeholder' => 'Select',
                                'class' => 'form-control',
                            ]) !!}
                            @error('tax')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('sale_tax', 'Sale Tax (%) *') !!}
                            {!! Form::number('sale_tax', null, [
                                'wire:model.live' => 'sale_tax',
                                'class' => 'form-control',
                                'placeholder' => 'Sale Tax',
                            ]) !!}
                            @error('sale_tax')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('registration', 'Registration *') !!}
                            {!! Form::select('registration', ['Yes' => 'Yes', 'No' => 'No'], null, [
                                'wire:model.live' => 'registration',
                                'placeholder' => 'Select',
                                'class' => 'form-control',
                            ]) !!}
                            @error('registration')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('reg_fee', 'Registration Amount *') !!}
                            {!! Form::number('reg_fee', null, [
                                'wire:model.live' => 'reg_fee',
                                'class' => 'form-control',
                                'placeholder' => 'registration Amount',
                            ]) !!}
                            @error('reg_fee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('fitting', 'Fitting *') !!}
                            {!! Form::select('fitting', ['Yes' => 'Yes', 'No' => 'No'], null, [
                                'wire:model.live' => 'fitting',
                                'placeholder' => 'Select',
                                'class' => 'form-control',
                            ]) !!}
                            @error('fitting')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('fitting_price', 'Fitting Price *') !!}
                            {!! Form::number('fitting_price', null, [
                                'wire:model.live' => 'fitting_price',
                                'class' => 'form-control',
                                'placeholder' => 'Fitting Price',
                            ]) !!}
                            @error('fitting_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('sale_price', 'Sale Price *') !!}
                            {!! Form::number('sale_price', null, [
                                'wire:model.live' => 'sale_price',
                                'class' => 'form-control',
                                'placeholder' => 'Sale Price',
                            ]) !!}
                            @error('sale_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <br />
                            {!! Form::button('Add Vehicle', ['wire:click' => 'addrecord', 'class' => 'btn btn-primary mt-2']) !!}
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Enging</th>
                                <th>Chassis</th>
                                <th>Color</th>
                                <th>Model</th>
                                <th>Sale Price</th>
                                <th>Tax (%)</th>
                                <th>Registration Fee</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($purchased as $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value['vehicle'] }}</td>
                                    <td>{{ $value['engine'] }}</td>
                                    <td>{{ $value['chassis'] }}</td>
                                    <td>{{ $value['color'] }}</td>
                                    <td>{{ $value['model'] }}</td>
                                    <td>{{ $value['sale_price'] }}</td>
                                    <td>{{ $value['sale_tax'] }}%</td>
                                    <td>{{ $value['reg_fee'] }}</td>
                                    <td>{{ $value['total'] }}</td>
                                    <td>
                                        <button type="button" wire:click="edit({{ $key }})"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </button>

                                        <button type="button" wire:click="delete({{ $key }})"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('grand_total', 'Grand Total *') !!}
                            {!! Form::number('grand_total', null, [
                                'wire:model' => 'grand_total',
                                'class' => 'form-control',
                                'placeholder' => 'Grand Total',
                            ]) !!}
                            @error('grand_total')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('months', 'Months *') !!}
                                {!! Form::number('months', null, [
                                    'wire:model.live' => 'months',
                                    'class' => 'form-control',
                                    'placeholder' => 'Months',
                                ]) !!}
                                @error('months')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>
                {{-- <div class="row">
                    @if (!empty($months))
                        @for ($i = 1; $i <= $months; $i++)
                            @php
                                $currentMonth = \Carbon\Carbon::now()
                                    ->addMonths($i - 1)
                                    ->format('Y-m-d');
                            @endphp
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("instaDate. $i", "Date  $i") !!}
                                    {!! Form::date('instaDate. $i', $currentMonth, [
                                        'class' => 'form-control',
                                        'wire:model' => 'instaDate {{$i}}',
                                    ]) !!}

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("instaAmount. $i", "Amount  $i") !!}
                                    {!! Form::number('instaAmount. $i', null, [
                                        'class' => 'form-control',
                                        'wire:model' => 'instaAmount. {{$i}}',
                                        'placeholder' => "Amount for Month  $i",
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("instaDesc. $i", "Description  $i") !!}
                                    {!! Form::text('instaDesc. $i', null, [
                                        'class' => 'form-control',
                                        'wire:model' => 'instaDesc. $i',
                                        'placeholder' => "Description for Month  $i",
                                    ]) !!}
                                </div>
                            </div>
                        @endfor
                    @endif
                </div> --}}
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
