@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Purchase Request Details</h1>
            @foreach($purchaserequests as $row)
                <a href="/requestdetails/create/{{$row->id}}" class="btn btn-outline-success float-right" style="margin: 3px;">Add Items</a>
            @endforeach
            <a href="/purchaserequests" class="btn btn-outline-danger float-right" style="margin: 3px;">Back</a>
            {{-- <a href="/items/create" class="btn btn-success float-right">Add Item</a> --}}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                @foreach($purchaserequests as $row)
                <tr>
                    <td style="font-weight: bold;">Purchase Request #</td>
                    <td>{{$row->id}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Cost Center</td>
                    <td>{{$row->costcenter_id}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Fund Source</td>
                    <td>{{$row->fundsource_id}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">SAI Number</td>
                    <td>{{$row->sai_number}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Date</td>
                    <td>{{$row->date}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Purpose</td>
                    <td>{{$row->purpose}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Request Origin</td>
                    <td>{{$row->request_origin}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Approved By</td>
                    <td>{{$row->approved_by}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead align="center">
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Estimated Unit Cost</th>
                    <th>Estimated Cost</th>
                </thead>
                <tbody>
                    @if(count($requestdetails) > 0)
                        @foreach($requestdetails as $row)
                        <tr align="center">
                            <td>{{$row->item_id}}</td>
                            <td>{{$row->quantity}}</td>
                            <td>Php {{$row->estimate_unit_cost}}/per</td>
                            <td>Php {{$row->estimated_cost}}</td>
                        </tr>
                        @endforeach
                    @else 
                        <tr>
                            <td colspan="4" align="center">No records found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection