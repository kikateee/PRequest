@extends('layouts.app')
    
@section('content')
    <h1>Edit Item</h1>
    {!! Form::open(['action' => ['ItemsController@update', $items->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('description', 'Item Name')}}
            {{Form::text('description', $items->description, ['placeholder' => 'Description' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('stock', 'Stock')}}
            {{Form::number('stock', $items->stock, ['placeholder' => 'Quantity' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('unit_of_issue', 'Unit of Issue')}}
            {{Form::text('unit_of_issue', $items->unit_of_issue, ['placeholder' => '...' ,'class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-success float-right'])}}
    {!! Form::close() !!}
@endsection