@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Purchase Request Details</h1>
            {{-- <a href="/items/create" class="btn btn-success float-right">Add Item</a> --}}
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered table-sm">
            <thead align="center">
                <th>Item ID</th>
                <th>Quantity</th>
                <th>Estimated Unit Cost</th>
                <th>Estimated Cost</th>
            </thead>
            <tbody>
                @if(count($requestdetails) > 0)
                    @foreach($requestdetails as $row)
                        <tr>
                            <td>{{$row->item_id}}</td>
                            <td>{{$row->quantity}}</td>
                            <td>{{$row->estimate_unit_cost}}</td>
                            <td>{{$row->estimated_cost}}</td>
                        </tr>
                    @endforeach 
                @else 
                    <p>No records found.</p>
                @endif
            </tbody>
        </table>
    </div>
    
@endsection