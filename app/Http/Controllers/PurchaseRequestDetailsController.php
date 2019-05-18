<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\PurchaseRequest;
use App\PurchaseRequestDetail;

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
