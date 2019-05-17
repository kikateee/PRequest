
@extends('layouts.pdf')

@section('content')
    <div class="row">
        <h1>Purchase Request Details</h1>
    </div>
    <table class="table table-bordered">
        <tr>
            <td colspan="2">Information</td>
        </tr>
            @foreach($purchaserequests as $row)
                <tr>
                    <td style="font-weight: bold;">Purchase Request #</td>
                    <td>{{$row->id}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Cost Center</td>
                    <td>{{$row->costcenter_name}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Fund Source</td>
                    <td>{{$row->source}}</td>
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
                    <td style="font-weight: bold;">Request Origin</td>
                    <td>{{$row->request_origin}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Approved By</td>
                    <td>{{$row->approved_by}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" colspan="2">Purpose:</td>
                </tr>
                <tr>
                    <td colspan="2">{{$row->purpose}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2">Items</td>
            </tr>
            @if(count($requestdetails) > 0)
                @foreach($requestdetails as $row)
                <tr>
                    <td style="font-weight: bold;">Description</td>
                    <td>{{$row->description}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Quantity</td>
                    <td>{{$row->quantity}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Estimated Unit Cost</td>
                    <td>Php {{$row->estimate_unit_cost}}/per</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Estimated Cost</td>
                    <td>Php {{$row->estimated_cost}}</td>
                </tr>
                @endforeach
            @endif
    </table>
@endsection