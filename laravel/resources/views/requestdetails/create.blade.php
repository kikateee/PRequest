@extends('layouts.app')
    
@section('content')
    <h1>Add Item into Purchase Request</h1>
    {!! Form::open(['action' => 'PurchaseRequestDetails@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('description', 'Item Name')}}
            {{Form::text('description', '', ['placeholder' => 'Description' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('quantity', 'Quantity')}}
            {{Form::number('quantity', '', ['placeholder' => 'Quantity of Items' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('estimate_unit_cost', 'Estimate Unit Cost')}}
            {{Form::text('estimate_unit_cost', '', ['placeholder' => 'Estimate Cost per Unit' ,'class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-success float-right'])}}
    {!! Form::close() !!}
@endsection