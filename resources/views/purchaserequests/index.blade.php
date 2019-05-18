@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Purchase Requests</h1>
            {{-- <a href="/purchaserequests/create" class="btn btn-success float-right">Create Request</a> --}}
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered table-hover table-sm">
            <thead align="center">
                <th>#</th>
                <th>Cost Center</th>
                <th>Fund Source</th>
                <th>SAI Number</th>
                <th>Date</th>
                {{-- <th>Purpose</th> --}}
                <th>Request Origin</th>
                <th>Approved By</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if(count($purchaserequests) > 0)
                    @foreach($purchaserequests as $row)
                        <tr align="center">
                            <td>{{$row->id}}</td>
                            <td>{{$row->costcenter_name}}</td>
                            <td>{{$row->source}}</td>
                            <td>{{$row->sai_number}}</td>
                            <td>{{$row->date}}</td>
                            {{-- <td>{{$row->purpose}}</td> --}}
                            <td>{{$row->request_origin}}</td>
                            <td>{{$row->approved_by}}</td>
                            <td align="center">
                                <a href="/purchaserequests/{{$row->id}}" class="btn btn-outline-primary btn-sm">View</a>
                                {{-- <a href="/purchaserequests/{{$row->id}}" class="btn btn-outline-secondary btn-sm">Edit</a> --}}
                                {{-- <a href="/purchaserequests/{{$row->id}}" class="btn btn-outline-danger btn-sm">Delete</a> --}}
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
        {{-- {{$purchaserequests->links()}} --}}
    </div>
    
@endsection