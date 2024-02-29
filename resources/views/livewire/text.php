<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
</body>

</html>
