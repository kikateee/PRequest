@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col-6">
            <h1 class="display-4 float-left">Items</h1>
        </div>
    </div>
    <hr>
    <form action="/search" method="GET">
        <div class="row">
            <div class="col">
                <label for="">Filter by</label>
                <div class="input-group ">
                    <select name="filterBy" class="form-control" required>
                        <optgroup label="Filters">
                            <option value="costcenter_name">Cost Center</option>
                            <option value="source">Fund Source</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="">Quarter</label>
                <div class="input-group ">
                    <select name="quarter" class="form-control" required>
                        <optgroup label="Quarters">
                            <option value="1st Quarter">1st Quarter</option>
                            <option value="2nd Quarter">2nd Quarter</option>
                            <option value="3rd Quarter">3rd Quarter</option>
                            <option value="4th Quarter">4th Quarter</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="">Type</label>
                <div class="input-group ">
                    <select name="type" class="form-control" required>
                        <optgroup label="Types">
                            <option value="Primary">Primary</option>
                            <option value="Supplemental">Supplemental</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for=""></label>
                <div class="input-group mb-3">
                    <input type="text" name="searchInput" class="form-control" placeholder="(e.g, 'IT Department')" required>
                    <div class="input-group-append">
                        <input type="Submit" value="Search" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                    <th>Type</th>
                    <th>Quarter</th>
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
                                    <td>{{$row->type}}</td>
                                    {{Form::hidden('type', $row->type)}}
                                    <td>{{$row->quarter}}</td>
                                    {{Form::hidden('quarter', $row->quarter)}}
                                    <td>{{$row->stock}}</td>
                                    {{Form::hidden('stock', $row->stock)}}
                                    <td>{{$row->unit_of_issue}}</td>
                                    {{Form::hidden('unit_of_issue', $row->unit_of_issue)}}
                                    {{Form::hidden('remark', $row->remark)}}
                                    <td>
                                        {{-- <a href="" class="btn btn-primary btn-sm">View</a> --}}
                                        {{-- {{Form::submit('Create Purchase Request', ['class' => 'btn btn-success'])}} --}}
                                    <a href="/purchaserequests/create/{{$row->id}}/{{$row->costcenter_id}}/{{$row->fundsource_id}}" class="btn btn-outline-primary btn-sm">Create Purchase Request</a>
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
    {{$items->links()}}
@endsection