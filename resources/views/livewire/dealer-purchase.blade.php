<div class="row mt-4">
    <div class="col-lg-12">
        <h4>Vehicle Details</h4>
        <div class="card">
            <div class="card-body">
                {!! Form::open([
                    'wire:submit'=>'addvehicle',
                    'route' => 'dealer-purchase.store',
                    'method' => 'post',
                    'class' => 'parsley-examples',
                    'novalidate' => '',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('vehicle', 'vehicle *') !!}
                            {!! Form::select('vehicle', $vehicles, null, [
                                'wire:model' => 'vehicle_id',
                                'placeholder' => 'Select',
                                'class' => 'form-control',
                                'id' => 'vehicle',
                            ]) !!}
                            @error('vehicle_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('title', 'Title *') !!}
                            {!! Form::text('title', null, [
                                'wire:model' => 'title',
                                'class' => 'form-control',
                                'id' => 'title',
                                'placeholder' => 'Example CD 70 CD 125',
                            ]) !!}
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('eng', 'Engine Number *') !!}
                            {!! Form::text('engine', null, [
                                'wire:model' => 'engine',
                                'class' => 'form-control',
                                'id' => 'eng',
                                'placeholder' => 'Engine Number',
                            ]) !!}
                            @error('engine')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('chassis', 'Chassis Number *') !!}
                            {!! Form::text('chassis', null, [
                                'wire:model' => 'chassis',
                                'class' => 'form-control',
                                'id' => 'chassis',
                                'placeholder' => 'Chassis Number',
                            ]) !!}
                            @error('chassis')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('model', 'Model *') !!}
                            {!! Form::text('model', null, [
                                'wire:model' => 'model',
                                'class' => 'form-control',
                                'id' => 'model',
                                'placeholder' => 'Model',
                            ]) !!}
                            @error('model')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('color', 'Color *') !!}
                            {!! Form::text('color', null, [
                                'wire:model' => 'color',
                                'class' => 'form-control',
                                'id' => 'color',
                                'placeholder' => 'Color',
                            ]) !!}
                            @error('color')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 my-4">
                        {!! Form::submit('Add Vehicle', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                <table class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Enging</th>
                            <th>Chassis </th>
                            <th>Color</th>
                            <th>Model</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($data as $purchase)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $purchase['title'] }} </td>
                                <td> {{ $purchase['engine'] }} </td>
                                <td> {{ $purchase['chassis'] }} </td>
                                <td> {{ $purchase['color'] }} </td>
                                <td> {{ $purchase['model'] }} </td>
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
                    'wire:submit'=>'submit',
                    'route' => 'dealer-purchase.store',
                    'method' => 'post',
                    'class' => 'parsley-examples',
                    'novalidate' => '',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('dealer', 'dealer *') !!}
                            {!! Form::select('dealer', $dealers, null, [
                                'wire:model' => 'dealer_id',
                                'placeholder' => 'Select',
                                'class' => 'form-control',
                                'id' => 'dealer',
                            ]) !!}
                            @error('dealer_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('Date', 'Date *') !!}
                        {!! Form::date('date', \Carbon\Carbon::now()->format('Y-m-d'), [
                            'wire:model' => 'date',
                            'class' => 'form-control',
                            'min' => \Carbon\Carbon::now()->format('Y-m-d'),
                            'id' => 'Date',
                            'placeholder' => 'Date Amount',
                        ]) !!}
                        @error('date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('total', 'Purchase Amount *') !!}
                            {!! Form::number('total', null, [
                                'wire:model' => 'total',
                                'class' => 'form-control',
                                'min' => '10000',
                                'id' => 'total',
                                'placeholder' => 'Total Amount',
                            ]) !!}
                            @error('total')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('paid', 'Paid *') !!}
                            {!! Form::number('paid', null, [
                                'wire:model' => 'paid',
                                'class' => 'form-control',
                                'min' => '10000',
                                'id' => 'paid',
                                'placeholder' => 'Paid Amount',
                            ]) !!}
                            @error('paid')
                                <span class="text-danger">{{$message}}</span>
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
        </div><!--end card-->

    </div>
</div><!--end col-->
