<div>
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
                                {!! Form::label('eng', 'Engine Number *') !!}
                                {!! Form::select('vehicle', $vehicles, null, [
                                    'wire:model.live' => 'vehicle',
                                    'placeholder' => 'Select',
                                    'class' => 'form-control',
                                    'id' => 'status',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title', 'Title *') !!}
                                {!! Form::text('title', null, [
                                    'wire:model' => 'title',
                                    'class' => 'form-control',
                                    'id' => 'title',
                                    'placeholder' => 'Example CD 70 CD 125',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
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
                                    'id' => 'chassis',
                                    'placeholder' => 'Chassis Number',
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
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('power', 'Horse Power *') !!}
                                {!! Form::text('power', null, [
                                    'wire:model' => 'power',
                                    'class' => 'form-control',
                                    'id' => 'power',
                                    'placeholder' => 'power',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('tc-no', 'TC No *') !!}
                                {!! Form::text('tc', null, [
                                    'wire:model' => 'tcno',
                                    'class' => 'form-control',
                                    'id' => 'tc-no',
                                    'placeholder' => 'TC No',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('register', 'Register No *') !!}
                                {!! Form::text('register', null, [
                                    'wire:model' => 'register',
                                    'class' => 'form-control',
                                    'id' => 'register',
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



                    <h5 class="card-title">Extra Detail</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('purchaser', 'Purchaser Name *') !!}
                                {!! Form::text('purchaser', null, [
                                    'wire:model' => 'purchase_name',
                                    'class' => 'form-control',
                                    'id' => 'purchaser',
                                    'placeholder' => 'purchaser Name',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('s/o', 'Son Of *') !!}
                                {!! Form::text('s/o', null, [
                                    'wire:model' => 'son1',
                                    'class' => 'form-control',
                                    'id' => 'purchaser',
                                    'placeholder' => 'Son Of',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('address', 'Address *') !!}
                                {!! Form::text('address', null, [
                                    'wire:model' => 'address1',
                                    'class' => 'form-control',
                                    'id' => 'address',
                                    'placeholder' => 'Address',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('guarantor', 'Guarantor Name *') !!}
                                {!! Form::text('guarantor', null, [
                                    'wire:model' => 'guarantor_name',
                                    'class' => 'form-control',
                                    'id' => 'owner',
                                    'placeholder' => 'Guarantor Name',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('s/o', 'Son Of *') !!}
                                {!! Form::text('s/o', null, [
                                    'wire:model' => 'son3',
                                    'class' => 'form-control',
                                    'id' => 's/o',
                                    'placeholder' => 'Son Of',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('owner', 'Owner Name *') !!}
                                {!! Form::text('owner', null, [
                                    'wire:model' => 'owner_name',
                                    'class' => 'form-control',
                                    'id' => 'owner',
                                    'placeholder' => 'Owner Name',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('reference', 'Previouse Reference *') !!}
                                {!! Form::text('reference', null, [
                                    'wire:model' => 'refrence',
                                    'class' => 'form-control',
                                    'id' => 'reference',
                                    'placeholder' => 'Previouse Reference',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('saler', 'Saler Name *') !!}
                                {!! Form::text('saler', null, [
                                    'wire:model' => 'saler',
                                    'class' => 'form-control',
                                    'id' => 'saler',
                                    'placeholder' => 'Saler Name',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('s/o', 'Son Of *') !!}
                                {!! Form::text('s/o', null, [
                                    'wire:model' => 's/o',
                                    'class' => 'form-control',
                                    'id' => 'purchaser',
                                    'placeholder' => 'Son Of',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('phone', 'phone *') !!}
                                {!! Form::text('phone', null, [
                                    'wire:model' => 'phone',
                                    'class' => 'form-control',
                                    'id' => 'purchaser',
                                    'placeholder' => 'Phone',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('address', 'Address *') !!}
                                {!! Form::text('address', null, [
                                    'wire:model' => 'address',
                                    'class' => 'form-control',
                                    'id' => 'address',
                                    'placeholder' => 'Address',
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
                            {!! Form::date('date', \Carbon\Carbon::now()->format('Y-m-d'), [
                                'class' => 'form-control',
                                'min' => \Carbon\Carbon::now()->format('Y-m-d'),
                                'id' => 'Date',
                                'placeholder' => 'Date Amount',
                            ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('Time', 'Time *') !!}
                            {!! Form::time('time', \Carbon\Carbon::now()->format('H:i'), [
                                'class' => 'form-control',
                                'id' => 'Time',
                                'placeholder' => 'Select Time',
                            ]) !!}
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total', 'Total Value *') !!}
                                {!! Form::number('total', null, [
                                    'wire:model' => 'total',
                                    'class' => 'form-control',
                                    'min' => '10000',
                                    'id' => 'total',
                                    'placeholder' => 'Total Value',
                                ]) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('advance', 'Advance *') !!}
                                {!! Form::number('Advance', null, [
                                    'wire:model' => 'paid',
                                    'class' => 'form-control',
                                    'min' => '10000',
                                    'id' => 'advance',
                                    'placeholder' => 'Advance Amount',
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
