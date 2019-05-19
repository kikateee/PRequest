@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Edit Item Requested</h1>
            @foreach($purchaserequests as $row)
                {{-- <a href="/requestdetails/create/{{$row->id}}" class="btn btn-outline-success float-right" style="margin: 3px;">Add Item</a> --}}
                {{-- <a href="/purchaserequests/{{$row->id}}/edit" class="btn btn-outline-secondary float-right" style="margin: 3px;">Edit</a> --}}
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
                    <td style="font-weight: bold;" colspan="2">Purpose:</td>
                </tr>
                <tr>
                    <td colspan="2">{{$row->purpose}}</td>
                </tr>
                @endforeach
            </table>
            <hr>
            <a href="{{action('PDFController@downloadPDF', $row->id)}}" class="btn btn-primary float-right" style="margin: 3px;">Download PDF</a>
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
                    @foreach($requestdetails as $form)
                    {!! Form::open(['action' => ['PurchaseRequestDetailsController@update', $form->id], 'method' => 'POST']) !!}
                    @endforeach
                        @method('PATCH')
                        @csrf
                        @if(count($requestdetails) > 0)
                            @foreach($requestdetails as $row)
                            <tr align="center">
                                <td>
                                    {{ Form::hidden('current_item_id', $row->item_id)}}
                                    <select name="item_id" class="form-control">
                                        <optgroup label="Current">
                                            <option value="{{$row->item_id}}">{{$row->description}}</option>
                                        </optgroup>
                                        <optgroup label="Select New">
                                            @foreach($items as $edit)
                                                <option value="{{$edit->id}}">{{$edit->description}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </td>
                                <td>
                                    <input min="0" type="number" name="quantity" class="form-control" value="{{$row->quantity}}">
                                </td>
                                <td>
                                    <input min="0" type="number" name="estimate_unit_cost" class="form-control" value="{{$row->estimate_unit_cost}}">
                                </td>
                                <td>Php {{$row->estimated_cost}}</td>
                                <td>
                                    {{Form::submit('Update', ['class' => 'btn btn-success'])}}
                                    {{Form::hidden('purq_id', $row->purq_id)}}
                                </td>
                            </tr>
                            @endforeach
                    {!! Form::close() !!}
                        @else 
                            <tr>
                                <td colspan="5" align="center">No records found.</td>
                            </tr>
                        @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection