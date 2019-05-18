@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Edit Purchase Request Details</h1>
            @foreach($purchaserequests as $row)
                {{-- <a href="/requestdetails/create/{{$row->id}}" class="btn btn-outline-success float-right" style="margin: 3px;">Add Item</a> --}}
                {{-- <a href="{{action('PDFController@downloadPDF', $row->id)}}" class="btn btn-outline-primary float-right" style="margin: 3px;">Download PDF</a> --}}
            @endforeach
            <a href="/purchaserequests/{{$row->id}}" class="btn btn-outline-danger float-right" style="margin: 3px;">Back</a>
            {{-- <a href="/items/create" class="btn btn-success float-right">Add Item</a> --}}
        </div>
    </div>
    <hr>
    <form action="{{ action('PurchaseRequestsController@update', $row->id) }}" method="POST">
        @method('PATCH')
        @csrf
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
                        <td>
                            <select name="costcenter_id" class="form-control" required>
                                <optgroup label="Current">
                                    <option value="{{$row->costcenter_id}}">{{$row->costcenter_name}}</option>
                                </optgroup>
                                <optgroup label="Select New">
                                    @foreach($costcenters as $edit)
                                        <option value="{{$edit->id}}">{{$edit->costcenter_name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>    
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" align="right">Fund Source</td>
                        <td>
                        <select name="fundsource_id" class="form-control" required>
                            <optgroup label="Current">
                                <option value="{{$row->fundsource_id}}">{{$row->source}}</option>
                            </optgroup>
                            <optgroup label="Select New">
                                @foreach($fundsources as $edit)
                                    <option value="{{$edit->id}}">{{$edit->source}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" align="right">SAI Number</td>
                        <td>
                            <input type="number" name="sai_number" value="{{$row->sai_number}}" class="form-control" min="0" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" align="right">Date</td>
                        <td>
                            <input type="date" name="date" value="{{$row->date}}" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" align="right">Request Origin</td>
                        <td>
                            <input type="text" name="request_origin" value="{{$row->request_origin}}" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" align="right">Approved By</td>
                        <td>
                            <input type="text" name="approved_by" value="{{$row->approved_by}}" class="form-control" required> 
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="2" >Purpose:</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="textarea" name="purpose" value="{{$row->purpose}}" class="form-control" required>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <hr>
                <input type="submit" value="Update" class="btn btn-primary float-right">
            </div>
    </form>
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
                                    <a href="/requestdetails/edit/{{$row->purq_id}}" class="btn btn-outline-secondary btn-sm">Edit</a>
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
    
@endsection