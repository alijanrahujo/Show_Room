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
                {!! Form::open(['route' => 'dealer-purchase.store', 'method' => 'post', 'class' => 'parsley-examples', 'novalidate' => '', 'enctype' => 'multipart/form-data']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('dealer', 'dealer *') !!}
                            {!! Form::select('dealer',$dealers,null, array('wire:model'=>'dealer_id','placeholder' => 'Select','class' => 'form-control','id'=>'dealer')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('Date', 'Date *') !!}
                        {!! Form::date('date', \Carbon\Carbon::now()->format('Y-m-d'), ['wire:model'=>'' ,'class' => 'form-control', 'min' => \Carbon\Carbon::now()->format('Y-m-d'), 'id' => 'Date', 'placeholder' => 'Date Amount']) !!}

                    </div>
                </div>

                <div class="row">
                    <!-- <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total', 'Purchase Amount *') !!}
                                {!! Form::number('total', null, ['wire:model'=>'' ,'class' => 'form-control', 'min'=>'10000', 'id' => 'total', 'placeholder' => 'Total Amount']) !!}
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('vehicle', 'vehicle *') !!}
                            {!! Form::select('vehicle',$vehicles,null, array('wire:model'=>'vehicle_id','placeholder' => 'Select','class' => 'form-control','id'=>'vehicle')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('paid', 'Paid *') !!}
                            {!! Form::number('paid', null, ['wire:model'=>'paid' ,'class' => 'form-control', 'min'=>'10000', 'id' => 'paid', 'placeholder' => 'Paid Amount']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('title', 'Title *') !!}
                            {!! Form::text('title', null, ['wire:model'=>'title' ,'class' => 'form-control', 'id' => 'title', 'placeholder' => 'Example CD 70 CD 125']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('eng', 'Engine Number *') !!}
                            {!! Form::text('engine', null, ['wire:model'=>'engine' ,'class' => 'form-control', 'id' => 'eng', 'placeholder' => 'Engine Number']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('chassis', 'Chassis Number *') !!}
                            {!! Form::text('chassis', null, ['wire:model'=>'chassis' ,'class' => 'form-control', 'id' => 'chassis', 'placeholder' => 'Chassis Number']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('model', 'Model *') !!}
                            {!! Form::text('model', null, ['wire:model'=>'model' ,'class' => 'form-control', 'id' => 'model', 'placeholder' => 'Model']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('color', 'Color *') !!}
                            {!! Form::text('color', null, ['wire:model'=>'color' ,'class' => 'form-control', 'id' => 'color', 'placeholder' => 'Color']) !!}
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('status', 'Status *') !!}
                            {!! Form::select('status',['1'=>'Active','0'=>'Deactive'], 1, array('wire:model'=>'status','placeholder' => 'Select','class' => 'form-control','id'=>'status')) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mt-4">
                        <button class="btn btn-primary" type='button' wire:click='addrow'> Add </button>
                        <!-- {!! Form::submit('Submit', ['wire:model'=>'' ,'class' => 'btn btn-primary']) !!} -->
                    </div>
                </div>

                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Enging</th>
                            <th>Chassis </th>
                            <th>Color</th>
                            <th>Model</dth>
                            <th>Status</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($data as $purchase)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{$purchase['title']}} </td>
                            <td> {{$purchase['engine']}} </td>
                            <td> {{$purchase['chassis']}} </td>
                            <td> {{$purchase['color']}} </td>
                            <td> {{$purchase['model']}} </td>
                            <td> {{$purchase['status']}} </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                {!! Form::close() !!}

            </div>
        </div>
    </div><!--end card-->
</div><!--end col-->