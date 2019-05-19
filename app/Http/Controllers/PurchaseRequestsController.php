<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseRequest;
use App\PurchaseRequestDetail;
use App\CostCenter;
use App\FundSource;
use App\Item;
use DB;

class PurchaseRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaserequests = DB::table('purchase_requests')
        ->join('cost_centers','cost_centers.id','purchase_requests.costcenter_id')
        ->join('fund_sources', 'fund_sources.id', 'purchase_requests.fundsource_id')
        ->select(
            'cost_centers.costcenter_name', 
            'fund_sources.source', 
            'purchase_requests.sai_number', 
            'purchase_requests.purpose', 
            'purchase_requests.request_origin', 
            'purchase_requests.approved_by', 
            'purchase_requests.costcenter_id', 
            'purchase_requests.fundsource_id',
            'purchase_requests.id', 
            'purchase_requests.date',
            'purchase_requests.type',
            'purchase_requests.quarter',
            'purchase_requests.deleted'
            )
        ->where('purchase_requests.deleted', false)
        ->orderBy('purchase_requests.id', 'asc')
        // ->get();
        ->paginate(5);

        // $purchaserequests = PurchaseRequest::all();
            // $purchaserequests = PurchaseRequest::orderBy('id', 'asc')->paginate(10);
        return view('purchaserequests.index')->with('purchaserequests', $purchaserequests);
        // return view('purchaserequests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($item_id, $costcenter_id, $fundsource_id)
    {
        // $costcenters = CostCenter::all(['id', 'costcenter_name']);
        // $fundsources = FundSource::all(['id', 'description']);
        // $items = Item::all(['id', 'description']);
        $items = Item::where('id', $item_id)->get();
        $costcenters = CostCenter::where('id', $costcenter_id)->get();
        $fundsources = FundSource::where('id', $fundsource_id)->get();
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
            'type' => 'required',
            'quarter' => 'required',
            'sai_number' => 'required',
            'date' => 'required',
            'purpose' => 'required',
            'request_origin' => 'required',
            'approved_by' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'estimate_unit_cost' => 'required'
        ]);

        // Create Request
        $purchaserequest = new PurchaseRequest;
        $purchaserequest->costcenter_id = $request->input('costcenter_id');
        $purchaserequest->fundsource_id = $request->input('fundsource_id');
        $purchaserequest->sai_number = $request->input('sai_number');
        $purchaserequest->date = $request->input('date');
        $purchaserequest->purpose = $request->input('purpose');
        $purchaserequest->type = $request->input('type');
        $purchaserequest->quarter = $request->input('quarter');
        $purchaserequest->request_origin = $request->input('request_origin');
        $purchaserequest->approved_by = $request->input('approved_by');
        $purchaserequest->save();

        // Fetching the last inserted ID
        $insertedId = $purchaserequest->id;
        $item_id = $request->input('item_id');

        // Create Purchase Request Details
        $requestdetail = new PurchaseRequestDetail;
        $requestdetail->item_id = $request->input('item_id');
        $requestdetail->purq_id = $insertedId;
        $requestdetail->quantity = $request->input('quantity');
        $requestdetail->estimate_unit_cost = $request->input('estimate_unit_cost');
        $requestdetail->estimated_cost = $request->input('estimate_unit_cost') * $request->input('quantity');
        $requestdetail->save();

        // Updating the item's remark from Pending to Requested
            // In which from the Items index page, items with remarks of Requested will eventually filter
            // the items out from the index page itself
        $items = Item::find($item_id);
        $items->remark = 'Requested';
        $items->save();

        return redirect('/purchaserequests/' . $insertedId)->with('success', 'A Purchase Request has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchaserequests = DB::table('purchase_requests')
        ->join('cost_centers','cost_centers.id','purchase_requests.costcenter_id')
        ->join('fund_sources', 'fund_sources.id', 'purchase_requests.fundsource_id')
        ->select('cost_centers.costcenter_name', 'fund_sources.source', 'purchase_requests.sai_number', 'purchase_requests.purpose'
        ,'purchase_requests.request_origin', 'purchase_requests.approved_by', 'purchase_requests.costcenter_id', 'purchase_requests.fundsource_id',
        'purchase_requests.id', 'purchase_requests.date')
        ->where('purchase_requests.id', $id)
        ->get();

        $requestdetails = DB::table('purchase_request_details')
        ->join('items', 'items.id', 'purchase_request_details.item_id')
        ->select('items.description', 'purchase_request_details.estimate_unit_cost', 'purchase_request_details.quantity', 'purchase_request_details.estimated_cost', 
        'purchase_request_details.item_id', 'purchase_request_details.id', 'purchase_request_details.purq_id')
        ->where('purchase_request_details.purq_id', $id)
        ->get();

        return view('purchaserequests.show')->with('requestdetails', $requestdetails)->with('purchaserequests', $purchaserequests);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costcenters = CostCenter::all();
        $fundsources = FundSource::all();

        $purchaserequests = DB::table('purchase_requests')
        ->join('cost_centers','cost_centers.id','purchase_requests.costcenter_id')
        ->join('fund_sources', 'fund_sources.id', 'purchase_requests.fundsource_id')
        ->select(
            'cost_centers.costcenter_name', 
            'fund_sources.source', 
            'purchase_requests.sai_number', 
            'purchase_requests.purpose', 
            'purchase_requests.request_origin', 
            'purchase_requests.approved_by', 
            'purchase_requests.costcenter_id', 
            'purchase_requests.fundsource_id',
            'purchase_requests.id', 
            'purchase_requests.date'
            )
        ->where('purchase_requests.id', $id)
        ->get();

        $requestdetails = DB::table('purchase_request_details')
        ->join('items', 'items.id', 'purchase_request_details.item_id')
        ->select(
            'items.description', 
            'purchase_request_details.estimate_unit_cost', 
            'purchase_request_details.quantity', 
            'purchase_request_details.estimated_cost', 
            'purchase_request_details.item_id', 
            'purchase_request_details.id', 
            'purchase_request_details.purq_id'
            )
        ->where('purchase_request_details.purq_id', $id)
        ->get();

        return view('purchaserequests.edit')
        ->with('requestdetails', $requestdetails)
        ->with('purchaserequests', $purchaserequests)
        ->with('costcenters', $costcenters)
        ->with('fundsources', $fundsources);
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
        $this->validate($request, [
            'costcenter_id' => 'required',
            'fundsource_id' => 'required',
            'sai_number' => 'required',
            'date' => 'required',
            'purpose' => 'required',
            'request_origin' => 'required',
            'approved_by' => 'required'
        ]);

        // Edit Request
        $purchaserequest = PurchaseRequest::find($id);
        $purchaserequest->costcenter_id = $request->input('costcenter_id');
        $purchaserequest->fundsource_id = $request->input('fundsource_id');
        $purchaserequest->sai_number = $request->input('sai_number');
        $purchaserequest->date = $request->input('date');
        $purchaserequest->purpose = $request->input('purpose');
        $purchaserequest->request_origin = $request->input('request_origin');
        $purchaserequest->approved_by = $request->input('approved_by');
        $purchaserequest->save();

        return redirect('/purchaserequests/' . $id)->with('success', 'Request Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchaserequests = PurchaseRequest::find($id);
        $purchaserequests->deleted = true;
        $purchaserequests->save();

        return redirect('/purchaserequests')->with('success', 'A Purchase Request has been removed.')->with('purchaserequests', $purchaserequests);
    }
}
