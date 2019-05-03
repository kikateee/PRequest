@extends('layouts.app')
    
@section('content')
    <h1>Add Cost Center</h1>
    {!! Form::open(['action' => 'CostCentersController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('costcenter_name', 'Cost Center')}}
            {{Form::text('costcenter_name', '', ['placeholder' => 'Department Name' ,'class' => 'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::label('section_name', 'Section Name')}}
                {{Form::text('section_name', '', ['placeholder' => 'Section' ,'class' => 'form-control'])}}
            </div>
        {{Form::submit('Submit', ['class' => 'btn btn-success float-right'])}}
    {!! Form::close() !!}
@endsection