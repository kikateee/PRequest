@extends('layouts.app')
    
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="float-left">Fund Sources</h1>
            <a href="/fundsources/create" class="btn btn-success float-right">Add Source</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead align="center">
                <th>#</th>
                <th>Description</th>
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
                                <a href="">View</a>
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