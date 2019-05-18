@extends('layouts.app')
    
@section('content')
    <h1>Add Source</h1>
    {!! Form::open(['action' => 'FundSourcesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('description', 'Fund Source')}}
            {{Form::text('description', '', ['placeholder' => 'Description' ,'class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-success float-right'])}}
    {!! Form::close() !!}
@endsection