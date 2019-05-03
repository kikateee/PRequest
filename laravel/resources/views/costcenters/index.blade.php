@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Cost Centers</h1>
            <a href="/costcenters/create" class="btn btn-success float-right">Add Cost Center</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered table-sm">
            <thead align="center">
                <th>#</th>
                <th>Cost Center</th>
                <th>Section</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if(count($costcenters) > 0)
                    @foreach($costcenters as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->costcenter_name}}</td>
                            <td>{{$row->section_name}}</td>
                            <td align="center">
                                {{-- <a href="" class="btn btn-primary btn-sm">View</a> --}}
                                <a href="" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
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
    </div>
    
@endsection