@extends('layouts.app')
    
@section('content')
    <h1>Create Request</h1>
    {!! Form::open(['action' => 'PurchaseRequestsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('costcenter_id', 'Cost Center')}}
            {{Form::select('costcenter_id', $costcenters, null, ['placeholder' => 'Cost Center' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('fundsource_id', 'Fund Source')}}
            {{Form::select('fundsource_id', $fundsources, null, ['placeholder' => 'Fund Source' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('sai_number', 'SAI Number')}}
            {{Form::text('sai_number', '', ['placeholder' => 'SAI Number' ,'class' => 'form-control'])}}
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
        {{Form::submit('Submit', ['class' => 'btn btn-success float-right'])}}
    {!! Form::close() !!}
@endsection