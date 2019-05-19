@extends('layouts.app')
    
@section('content')
    <div class="jumbotron jumbotron">
        <div class="container">
            <h1 class="display-5">Create a Purchase Request</h1>
            <p class="lead">You may add another item after you submit this form.</p>
        </div>
    </div>
    <hr>
    {!! Form::open(['action' => 'PurchaseRequestsController@store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-6">
            <h4>Information</h4>
            <br>
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
                                <input type="text" value="{{$row->source}}" class="form-control" readonly> 
                                <input type="hidden" name="fundsource_id" value="{{$row->id}}">
                            @endforeach
                    </div>
                </div> 
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {{Form::label('sai_number', 'SAI Number')}}
                        {{Form::number('sai_number', '', ['min' => '0', 'placeholder' => '### ### ###' ,'class' => 'form-control'])}}
                    </div>
                    <div class="col">
                        {{Form::label('date', 'Date')}}
                        {{Form::date('date', '', ['placeholder' => 'Date' ,'class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col">
            <h4>Item Requested</h4>
            <br>
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
                    <input type="hidden" value="{{$row->quarter}}" name="quarter" readonly>
                    <input type="hidden" value="{{$row->type}}" name="type" readonly>
                    <input type="text" value="{{$row->description}}" class="form-control" readonly>
                @endforeach
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {{Form::label('quantity', 'Quantity')}}
                        {{Form::number('quantity', '', ['min' => '0', 'placeholder' => 'Quantity of Items' ,'class' => 'form-control'])}}
                    </div>
                    <div class="col">
                        {{Form::label('estimate_unit_cost', 'Estimate Cost per Unit')}}
                        {{Form::number('estimate_unit_cost', '', ['min' => '0', 'placeholder' => 'Estimated Cost of an Item' ,'class' => 'form-control'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('purpose', 'Purpose')}}
                {{Form::textarea('purpose', '', ['rows' => '5', 'cols' => '50', 'placeholder' => 'Purpose of the purchase request...' ,'class' => 'form-control'])}}
            </div>
        </div>
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
        <hr>
        {{Form::submit('Submit', ['style' => 'margin: 3px;', 'class' => 'btn btn-success float-right'])}}
        <a href="/purchaserequests" class="btn btn-default float-right" style="margin: 3px;">Cancel</a>
    {!! Form::close() !!}
@endsection