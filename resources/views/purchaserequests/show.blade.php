@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Purchase Request Details</h1>
            @foreach($purchaserequests as $row)
                <a href="/requestdetails/create/{{$row->id}}" class="btn btn-outline-success float-right" style="margin: 3px;">Add Item</a>
                <a href="/purchaserequests/{{$row->id}}/edit" class="btn btn-outline-secondary float-right" style="margin: 3px;">Edit</a>
            @endforeach
            <a href="/purchaserequests" class="btn btn-outline-danger float-right" style="margin: 3px;">Back</a>
            {{-- <a href="/items/create" class="btn btn-success float-right">Add Item</a> --}}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-5">
            <h3>Information</h3>
            <table class="table table-sm table-bordered">
                @foreach($purchaserequests as $row)
                <tr>
                    <td style="font-weight: bold;" align="right">Purchase Request #</td>
                    <td>{{$row->id}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" align="right">Cost Center</td>
                    <td>{{$row->costcenter_name}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" align="right">Fund Source</td>
                    <td>{{$row->source}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" align="right">SAI Number</td>
                    <td>{{$row->sai_number}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" align="right">Date</td>
                    <td>{{$row->date}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" align="right">Request Origin</td>
                    <td>{{$row->request_origin}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" align="right">Approved By</td>
                    <td>{{$row->approved_by}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" align="right">Export to</td>
                    <td>
                        <a href="{{action('PDFController@downloadPDF', $row->id)}}" style="margin: 3px;">PDF</a>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" colspan="2">Purpose:</td>
                </tr>
                <tr>
                    <td colspan="2">{{$row->purpose}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-7">
            <h3>Items</h3>
            <table class="table table-sm table-bordered table-hover">
                <thead align="center">
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Estimated Unit Cost</th>
                    <th>Estimated Cost</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if(count($requestdetails) > 0)
                        @foreach($requestdetails as $row)
                        <tr align="center">
                            <td>{{$row->description}}</td>
                            <td>{{$row->quantity}}</td>
                            <td>Php {{$row->estimate_unit_cost}}/per</td>
                            <td>Php {{$row->estimated_cost}}</td>
                            <td>
                                {!! Form::open(['action' => ['PurchaseRequestDetailsController@destroy', $row->purq_id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Remove', ['class' => 'btn btn-outline-danger btn-sm'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    @else 
                        <tr>
                            <td colspan="5" align="center">No records found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <hr>
@endsection