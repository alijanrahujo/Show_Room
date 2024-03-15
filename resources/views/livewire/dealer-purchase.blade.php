<div class="row mt-4">
    <div class="col-lg-12">
        <h4>Vehicle Details</h4>
        <div class="card">
            <div class="card-body">
                {!! Form::open([
                    'wire:submit' => 'addvehicle',
                    'route' => 'dealer-purchase.store',
                    'method' => 'post',
                    'class' => 'parsley-examples',
                    'novalidate' => '',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('vehicle', 'Vehicle *') !!}
                            {!! Form::select('vehicle', $vehicles, null, [
                                'wire:model.live' => 'vehicle_id',
                                'placeholder' => 'Select',
                                'class' => 'form-control',
                            ]) !!}
                            @error('vehicle_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
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

                    <div class="col-md-4">
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
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('model', 'Model *') !!}
                            {!! Form::text('model', null, [
                                'wire:model' => 'model',
                                'class' => 'form-control',
                                'placeholder' => 'Model',
                            ]) !!}
                            @error('model')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('horse_power', 'Horse Power *') !!}
                            {!! Form::text('horse_power', null, [
                                'wire:model' => 'horse_power',
                                'class' => 'form-control',
                                'placeholder' => 'Horse power',
                            ]) !!}
                            @error('horse_power')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('purchase_amount', 'Purchase Amount *') !!}
                            {!! Form::number('purchase_amount', null, [
                                'wire:model' => 'purchase_amount',
                                'class' => 'form-control',
                                'placeholder' => 'Purchase Amount',
                            ]) !!}
                            @error('purchase_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('purchase_tax', 'Purchase Tax *') !!}
                            {!! Form::number('purchase_tax', null, [
                                'wire:model' => 'purchase_tax',
                                'class' => 'form-control',
                                'placeholder' => 'Purchase Tax',
                            ]) !!}
                            @error('purchase_tax')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('do_number', 'DO Number *') !!}
                            {!! Form::number('do_number', null, [
                                'wire:model' => 'do_number',
                                'class' => 'form-control',
                                'placeholder' => 'DO Number',
                            ]) !!}
                            @error('do_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('do_date', 'DO Date *') !!}
                            {!! Form::date('do_date', null, [
                                'wire:model' => 'do_date',
                                'class' => 'form-control',
                                'placeholder' => 'DO Date',
                            ]) !!}
                            @error('do_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 my-4">
                        @if ($edit_data)
                            {!! Form::submit('Update Vehicle', ['class' => 'btn btn-warning']) !!}
                        @else
                            {!! Form::submit('Add Vehicle', ['class' => 'btn btn-primary']) !!}
                        @endif
                    </div>
                </div>

                <table class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Engine</th>
                            <th>Chassis </th>
                            <th>Color</th>
                            <th>Model</th>
                            <th>Horse Power</th>
                            <th>Purchase Amount</th>
                            <th>Purchase Tax</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $purchase)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $purchase['title'] }} </td>
                                <td> {{ $purchase['engine'] }} </td>
                                <td> {{ $purchase['chassis'] }} </td>
                                <td> {{ $purchase['color'] }} </td>
                                <td> {{ $purchase['model'] }} </td>
                                <td> {{ $purchase['horse_power'] }} </td>
                                <td> {{ $purchase['purchase_amount'] }} </td>
                                <td> {{ $purchase['purchase_tax'] }}% </td>
                                <td> {{ $purchase['total'] }} </td>
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
                {!! Form::close() !!}
            </div>
        </div><!--end card-->

        <h4>Purchase Details</h4>

        <div class="card">
            <div class="card-body">
                {!! Form::open([
                    'wire:submit' => 'submit',
                    'route' => 'dealer-purchase.store',
                    'method' => 'post',
                    'class' => 'parsley-examples',
                    'novalidate' => '',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('dealer', 'Dealer *') !!}
                            {!! Form::select('dealer', $dealers, null, [
                                'wire:model' => 'dealer_id',
                                'placeholder' => 'Select',
                                'class' => 'form-control',
                                'id' => 'dealer',
                            ]) !!}
                            @error('dealer_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('total_amount', 'Total Purchase Amount *') !!}
                            {!! Form::number('total_amount', null, [
                                'wire:model' => 'total_amount',
                                'class' => 'form-control',
                                'id' => 'total_amount',
                                'readonly',
                                'placeholder' => 'Total Amount',
                            ]) !!}
                            @error('total')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        {!! Form::label('Date', 'Date *') !!}
                        {!! Form::date('date', $date, [
                            'wire:model' => 'date',
                            'class' => 'form-control',
                            'id' => 'Date',
                            'placeholder' => 'Date Amount',
                        ]) !!}
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mt-4">
                        @if ($edit_form_id)
                            {!! Form::submit('Update', ['class' => 'btn btn-warning']) !!}
                        @else
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        @endif
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div><!--end card-->

    </div>
</div><!--end col-->
