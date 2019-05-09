@extends('layouts.app')
    
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Purchase Request</h1>
            {{-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> --}}
        </div>
    </div>
    <hr>
    {!! Form::open(['action' => 'PurchaseRequestsController@store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-6">
            <h3>Information</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="costcenter_id">Cost Center</label>
                            @foreach($costcenters as $row)
                                <input type="text" value="{{$row->costcenter_name}}" class="form-control" readonly>
                                <input type="hidden" name="costcenter_id" value="{{$row->id}}">
                            @endforeach
                    </div>
                    <div class="col">
                        <label for="fundsource_id">Fund Sources</label>
                            @foreach($fundsources as $row)
                                <input type="text" value="{{$row->description}}" class="form-control" readonly> 
                                <input type="hidden" name="fundsource_id" value="{{$row->id}}">
                            @endforeach
                    </div>
                </div> 
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {{Form::label('sai_number', 'SAI Number')}}
                        {{Form::number('sai_number', '', ['placeholder' => 'SAI Number' ,'class' => 'form-control'])}}
                    </div>
                    <div class="col">
                        {{Form::label('date', 'Date')}}
                        {{Form::date('date', '', ['placeholder' => 'Date' ,'class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{Form::label('purpose', 'Purpose')}}
                {{Form::textarea('purpose', '', ['rows' => '5', 'cols' => '50', 'placeholder' => 'Purpose of the purchase request...' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {{Form::label('request_origin', 'Request Origin')}}
                        {{Form::text('request_origin', '', ['placeholder' => 'Request Origin' ,'class' => 'form-control'])}}
                    </div>
                    <div class="col">
                        {{Form::label('approved_by', 'Approved By')}}
                        {{Form::text('approved_by', '', ['placeholder' => 'Approved By' ,'class' => 'form-control'])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h3>Item Requested</h3>
            <div class="form-group">
                {{-- <label for="item_id">Item</label>
                <select name="item_id" class="form-control">
                    @foreach($items as $row)
                        <option value="{{$row->id}}">{{$row->description}}</option>
                    @endforeach
                </select> --}}
                @foreach($items as $row)
                    <label for="item_id">Item</label>
                    <input type="hidden" value="{{$row->id}}" name="item_id" readonly>
                    <input type="text" value="{{$row->description}}" class="form-control" readonly>
                @endforeach
            </div>
            <div class="form-group">
                {{Form::label('quantity', 'Quantity')}}
                {{Form::number('quantity', '', ['placeholder' => 'Quantity of Items' ,'class' => 'form-control'])}}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {{Form::label('estimate_unit_cost', 'Estimate Cost per Unit')}}
                        {{Form::number('estimate_unit_cost', '', ['placeholder' => 'Estimated Cost of an Item' ,'class' => 'form-control'])}}
                    </div>
                    <div class="col">
                        {{Form::label('estimated_cost', 'Estimated Cost')}}
                        {{Form::number('estimated_cost', '', ['placeholder' => 'Estimated Cost' ,'class' => 'form-control'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
        <hr>
        <a href="/purchaserequests" class="btn btn-outline-danger float-right" style="margin: 3px;">Cancel</a>
        {{Form::submit('Submit', ['style' => 'margin: 3px;', 'class' => 'btn btn-outline-success float-right'])}}
    {!! Form::close() !!}
@endsection