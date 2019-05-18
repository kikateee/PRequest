@extends('layouts.app')
    
@section('content')
    <h1>Add Item</h1>
    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('description', 'Item Name')}}
            {{Form::text('description', '', ['placeholder' => 'Description' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('stock', 'Stock')}}
            {{Form::number('stock', '', ['placeholder' => 'Quantity' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('unit_of_issue', 'Unit of Issue')}}
            {{Form::text('unit_of_issue', '', ['placeholder' => '...' ,'class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-success float-right'])}}
    {!! Form::close() !!}
@endsection