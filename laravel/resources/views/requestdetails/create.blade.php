@extends('layouts.app')
    
@section('content')
    <h1>Add Item into Purchase Request</h1>
    {!! Form::open(['action' => 'PurchaseRequestDetailsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col">
                    {{Form::label('description', 'Item Name')}}
                    <select name="item_id" class="form-control">
                        <option value="">Select an Item</option>
                        <optgroup label="Items">
                            @foreach($items as $row)
                                <option value="{{$row->id}}">{{$row->description}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    {{Form::label('quantity', 'Quantity')}}
                    {{Form::number('quantity', '', ['min' => '0', 'placeholder' => 'Quantity of Items' ,'class' => 'form-control'])}}
                </div>
                <div class="col">
                    {{Form::label('estimate_unit_cost', 'Estimate Unit Cost')}}
                    {{Form::number('estimate_unit_cost', '', ['min' => '0', 'placeholder' => 'Estimate Cost per Unit' ,'class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <hr>
        @foreach($purchaserequests as $row)
            <a href="/purchaserequests/{{$row->id}}" class="btn btn-outline-danger float-right" style="margin: 3px;">Cancel</a>
            {{Form::hidden('purq_id', $row->id)}}
        @endforeach
        
        {{Form::submit('Submit', ['style' => 'margin: 3px;', 'class' => 'btn btn-outline-success float-right'])}}
    {!! Form::close() !!}
@endsection