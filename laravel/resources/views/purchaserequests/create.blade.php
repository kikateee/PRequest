@extends('layouts.app')
    
@section('content')
    <h1>Create Request</h1>
    {!! Form::open(['action' => 'PurchaseRequestsController@store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                {{-- {{Form::label('costcenter_id', 'Cost Center')}}
                {{Form::text('costcenter_id', '', ['placeholder' => 'Cost Center' ,'class' => 'form-control'])}} --}}
                {{-- {{Form::select('costcenter_id', $costcenters, null, ['placeholder' => 'Cost Center' ,'class' => 'form-control'])}} --}}
                <label for="costcenter_id">Cost Center</label>
                <select name="costcenter_id" class="form-control">
                    @foreach($costcenters as $row)
                        <option value="{{$row->id}}">{{$row->costcenter_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{-- {{Form::label('fundsource_id', 'Fund Source')}}
                {{Form::text('fundsource_id', '', ['placeholder' => 'Fund Source' ,'class' => 'form-control'])}} --}}
                {{-- {{Form::select('fundsource_id', $fundsources, null, ['placeholder' => 'Fund Source' ,'class' => 'form-control'])}} --}}
                <label for="fundsource_id">Fund Sources</label>
                <select name="fundsource_id" class="form-control">
                    @foreach($fundsources as $row)
                        <option value="{{$row->id}}">{{$row->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('sai_number', 'SAI Number')}}
                {{Form::number('sai_number', '', ['placeholder' => 'SAI Number' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('date', 'Date')}}
                {{Form::date('date', '', ['placeholder' => 'Date' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('purpose', 'Purpose')}}
                {{Form::textarea('purpose', '', ['placeholder' => 'Purpose' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('request_origin', 'Request Origin')}}
                {{Form::text('request_origin', '', ['placeholder' => 'Request Origin' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('approved_by', 'Approved By')}}
                {{Form::text('approved_by', '', ['placeholder' => 'Approved By' ,'class' => 'form-control'])}}
            </div>
        </div>
        {{-- <div class="col">
            <div class="form-group">
                <label for="item_id">Item</label>
                <select name="item_id" class="form-control">
                    @foreach($items as $row)
                        <option value="{{$row->id}}">{{$row->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fundsource_id">Fund Sources</label>
                <select name="fundsource_id" class="form-control">
                    @foreach($fundsources as $row)
                        <option value="{{$row->id}}">{{$row->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('quantity', 'Quantity')}}
                {{Form::number('quantity', '', ['placeholder' => 'Quantity of Items' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('estimate_unit_cost', 'Estimate Cost')}}
                {{Form::number('estimate_unit_cost', '', ['placeholder' => 'Estimated Cost of an Item' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('estimated_cost', 'Estimated Cost')}}
                {{Form::number('estimated_cost', '', ['placeholder' => 'Estimated Cost' ,'class' => 'form-control'])}}
            </div>
        </div> --}}
    </div>
        <hr>
        <a href="/purchaserequests" class="btn btn-danger float-right" style="margin: 3px;">Cancel</a>
        {{Form::submit('Submit', ['style' => 'margin: 3px;', 'class' => 'btn btn-success float-right'])}}
    {!! Form::close() !!}
@endsection