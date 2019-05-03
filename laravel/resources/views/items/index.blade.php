@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Items</h1>
            <a href="/items/create" class="btn btn-success float-right">Add Item</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead align="center">
                <th>#</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Unit of Issue</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->stock}}</td>
                            <td>{{$row->unit_of_issue}}</td>
                            <td>
                                <a href="/items/show">View</a>
                            </td>
                        </tr>
                    @endforeach 
                @else 
                    <p>No records found.</p>
                @endif
            </tbody>
            
        </table>
    </div>
    
@endsection