<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseRequest;
use App\PurchaseRequestDetail;
use App\CostCenter;
use App\FundSource;
use App\Item;

class PurchaseRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $purchaserequests = PurchaseRequest::all();
        $purchaserequests = PurchaseRequest::orderBy('id', 'asc')->paginate(10);
        return view('purchaserequests.index')->with('purchaserequests', $purchaserequests);
        // return view('purchaserequests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $costcenters = CostCenter::all(['id', 'costcenter_name']);
        // $fundsources = FundSource::all(['id', 'description']);
        // $items = Item::all(['id', 'description']);
        $items = Item::where('id', $id)->get();
        $costcenters = CostCenter::where('id', $id)->get();
        $fundsources = FundSource::where('id', $id)->get();
        // $purchaserequests =['' => 'Please Select a Cost Center'] + CostCenter::lists('costcenter_name','id')->toArray();
        return view('purchaserequests.create')->with('costcenters', $costcenters)->with('fundsources', $fundsources)->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'costcenter_id' => 'required',
            'fundsource_id' => 'required',
            'sai_number' => 'required',
            'date' => 'required',
            'purpose' => 'required',
            'request_origin' => 'required',
            'approved_by' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'estimated_cost' => 'required',
            'estimate_unit_cost' => 'required'
        ]);

        // Create Request
        $purchaserequest = new PurchaseRequest;
        $purchaserequest->costcenter_id = $request->input('costcenter_id');
        $purchaserequest->fundsource_id = $request->input('fundsource_id');
        $purchaserequest->sai_number = $request->input('sai_number');
        $purchaserequest->date = $request->input('date');
        $purchaserequest->purpose = $request->input('purpose');
        $purchaserequest->request_origin = $request->input('request_origin');
        $purchaserequest->approved_by = $request->input('approved_by');
        $purchaserequest->save();

        // Fetching the last inserted ID
        $insertedId = $purchaserequest->id;

        // Create Purchase Request Details
        $requestdetail = new PurchaseRequestDetail;
        $requestdetail->item_id = $request->input('item_id');
        $requestdetail->purq_id = $insertedId;
        $requestdetail->quantity = $request->input('quantity');
        $requestdetail->estimated_cost = $request->input('estimated_cost');
        $requestdetail->estimate_unit_cost = $request->input('estimate_unit_cost');
        $requestdetail->save();

        return redirect('/purchaserequests/' . $insertedId)->with('success', 'Request Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $purchaserequest = PurchaseRequestDetail::find($id);

        // $purchaserequest = PurchaseRequestDetail::where('purq_id', $id)->get();

        // $purchaserequest = PurchaseRequestDetail::where('purq_id', $id)->get();
        // return view('purchaserequests.show')

        // Old
        $requestdetails = PurchaseRequestDetail::where('purq_id', $id)->get();
        return view('purchaserequests.show')->with('requestdetails', $requestdetails);

        // $items = Item::where('id', $id)->get();
        // return view('purchaserequests.show')->with('items', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
