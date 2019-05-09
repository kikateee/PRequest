@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Items</h1>
            {{-- <a href="/items/create" class="btn btn-success float-right">Add Item</a> --}}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            {!! Form::open(['action' => 'PurchaseRequestsController@create', 'method' => 'POST']) !!}
            <table class="table table-bordered table-hover table-sm">
                <thead align="center">
                    <th>#</th>
                    <th>Description</th>
                    <th>Cost Center</th>
                    <th>Fund Source</th>
                    <th>Stock</th>
                    <th>Unit of Issue</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if(count($items) > 0)
                        @foreach($items as $row)
                                <tr align="center">
                                    <td>{{$row->id}}</td>
                                    {{Form::hidden('item_id', $row->id)}}
                                    <td>{{$row->description}}</td>
                                    {{Form::hidden('description', $row->description)}}
                                        <td>{{$row->costcenter_name}}</td>
                                        {{Form::hidden('costcenter_id', $row->costcenter_id)}}
                                        <td>{{$row->source}}</td>
                                        {{Form::hidden('fundsource_id', $row->fundsource_id)}}
                                    <td>{{$row->stock}}</td>
                                    {{Form::hidden('stock', $row->stock)}}
                                    <td>{{$row->unit_of_issue}}</td>
                                    {{Form::hidden('unit_of_issue', $row->unit_of_issue)}}
                                    <td>
                                        {{-- <a href="" class="btn btn-primary btn-sm">View</a> --}}
                                        {{-- {{Form::submit('Create Purchase Request', ['class' => 'btn btn-success'])}} --}}
                                    <a href="/purchaserequests/create/{{$row->id}}/{{$row->costcenter_id}}/{{$row->fundsource_id}}" class="btn btn-outline-primary btn-sm">Create Purchase Order</a>
                                        {{-- <a href="/items/{{$row->id}}/edit" class="btn btn-secondary btn-sm">Edit</a> --}}
                                        {{-- <a href="/items/{{$row->id}}/destroy" class="btn btn-danger btn-sm">Delete</a> --}}
                                    </td>
                                </tr>
                        @endforeach 
                    @else 
                        <tr>
                            <td colspan="9" align="center">No records found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- {{$items->links()}} --}}
@endsection