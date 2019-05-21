@extends('layouts.pdf-v2')

@section('content')
    <div id="paper">
        <div id="logo">
            <p><img style="width:70px;height:70px;" src="C:\Users\Ixelles\Pictures\iit.png" /></p>
            <p align="center"><em style="font-size:11px;">Republic of the Philippines</em>
            <br>
            Mindanao State University
            <br>
            <b>ILIGAN INSTITUTE OF TECHNOLOGY</b>
            <br>
            Iligan City</p>
        </div>

        <h3 align="center">PURCHASE REQUEST</h3>
        @foreach($purchaserequests as $purq)
        <div id="content">
            <p>Cost Center: {{$purq->costcenter_name}}</p>
            <p>SAI No. : {{$purq->sai_number}}</p>
        </div>

        <div id="id_date">
            <p>Purchase No. : {{$purq->id}}</p>
            <p>Date : {{$purq->date}}</p>
        </div>
        @endforeach
        <div id="tables">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="width:auto"><center>Quantity</center></th>
                        {{-- <th scope="col" style="width:auto"><center>Unit of issue</center></th> --}}
                        <th scope="col" style="width:auto"><center>Item description</center></th>
                        {{-- <th scope="col" style="width:auto"><center>Stock no.</center></th> --}}
                        <th scope="col" style="width:auto"><center>Estimated Unit Cost</center></th>
                        <th scope="col" style="width:auto"><center>Estimated Cost</center></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($requestdetails as $req)
                    <tr>
                        <td>{{$req->quantity}}</td>
                        {{-- <td><center>{{$req->estimate_unit_cost}}</center></td> --}}
                        {{-- <td><center>{{$req->unit_of_issue}}</center></td> --}}
                        <td>{{$req->description}}</td>
                        <td><center>{{$req->estimate_unit_cost}}</center></td>
                        <td><center>{{$req->estimated_cost}}</center></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @foreach($purchaserequests as $purq)
        <div id="content">
            <p>Purpose: {{$purq->purpose}}</p>
            {{-- <br><br> --}}
            <p>Source of Funds: {{$purq->source}}</p>
        </div>
        <br><br><br><br><br><br>
        <div id="sign1">
            <p>Requested by:</p>
            <p>________________________<br></p>
        </div>

        <div id="sign">
            <p>Approved:</p>
            <p>________________________<br></p>
        </div>
        @endforeach
        <br>
        <br>
        <br>
    </div>
@endsection