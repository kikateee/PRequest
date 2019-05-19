<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\PurchaseRequest;
use App\PurchaseRequestDetail;
use DB;

class PurchaseRequestDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $items = Item::all(['id', 'description']);
        $purchaserequests = PurchaseRequest::where('id', $id)->get();

        return view('requestdetails.create')->with('items', $items)->with('purchaserequests', $purchaserequests);
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
            'purq_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'estimate_unit_cost' => 'required'
        ]);

        // Multiply quantity and unit cost
        $calculatedProduct = $request->input('quantity') * $request->input('estimate_unit_cost');

        // Create Purchase Request Details
        $requestdetail = new PurchaseRequestDetail;
        $requestdetail->item_id = $request->input('item_id');
        $requestdetail->purq_id = $request->input('purq_id');
        $requestdetail->quantity = $request->input('quantity');
        $requestdetail->estimate_unit_cost = $request->input('estimate_unit_cost');
        $requestdetail->estimated_cost = $calculatedProduct;
        $requestdetail->save();

        // Fetching the request ID
        $requestId = $requestdetail->purq_id;

        return redirect('/purchaserequests/' . $requestId)->with('success', 'Item Added in Request');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $items = Item::where('remark', 'Pending');
        // $items = Item::where('remark', 'Pending')->pluck('remark', 'id', 'description');
        $items = DB::table('items')
        ->where('remark', 'Pending')
        ->select('id', 'description', 'remark')
        ->get();

        $purchaserequests = PurchaseRequest::where('id', $id)->get();

        $requestdetails = DB::table('purchase_request_details')
        ->join('items', 'items.id', 'purchase_request_details.item_id')
        ->select(
            'items.description', 
            'purchase_request_details.id', 
            'purchase_request_details.item_id',
            'purchase_request_details.quantity',
            'purchase_request_details.purq_id',
            'purchase_request_details.estimate_unit_cost',
            'purchase_request_details.estimated_cost'
            )->where('purchase_request_details.id', $id)->get();

        return view('requestdetails.edit')
        ->with('items', $items)
        ->with('purchaserequests', $purchaserequests)
        ->with('requestdetails', $requestdetails);
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
            'item_id' => 'required',
            'quantity' => 'required',
            'estimate_unit_cost' => 'required'
        ]);

        // The product of quantity and estimate unit cost
        $calculatedProduct = $request->input('quantity') * $request->input('estimate_unit_cost');

        // Edit Item Requested
        $requestdetail = PurchaseRequestDetail::find($id);
        $requestdetail->item_id = $request->input('item_id');
        $requestdetail->purq_id = $request->input('purq_id');
        $requestdetail->quantity = $request->input('quantity');
        $requestdetail->estimate_unit_cost = $request->input('estimate_unit_cost');
        $requestdetail->estimated_cost = $calculatedProduct;
        $requestdetail->save();

        $item_id = $request->input('item_id');
        $purq_id = $request->input('purq_id');
        $current_item_id = $request->input('current_item_id');

        $currentItem = Item::find($current_item_id);
        $currentItem->remark = 'Pending';
        $currentItem->save();

        $items = Item::find($item_id);
        $items->remark = 'Requested';
        $items->save();

        return redirect('/purchaserequests/' . $purq_id)->with('success', 'Item Updated.');
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
