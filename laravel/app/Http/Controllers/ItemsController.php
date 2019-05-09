<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\CostCenter;
use App\FundSource;
use DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $costcenters = CostCenter::all();
        $fundsources = FundSource::all();

        // $costcenters = DB::table('cost_centers')->select('id', 'costcenter_name', 'section_name')->get();
        // $fundsources = DB::table('fund_sources')->select('id', 'description')->get();
        // $items = DB::table('items')
        // ->join('cost_centers', 'costcenters.id', '=', 'items.costcenter_id')
        // ->join('fund_sources', 'fundsources.id', '=', 'items.fundsource_id')
        // ->select('items.*')
        // ->get();
        
        return view('items.index')->with('items', $items);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'description' => 'required',
            'stock' => 'required',
            'unit_of_issue' => 'required'
        ]);

        // Create Request
        $items = new Item;
        $items->description = $request->input('description');
        $items->stock = $request->input('stock');
        $items->unit_of_issue = $request->input('unit_of_issue');
        $items->save();

        return redirect('/items')->with('success', 'Item Added');
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
        $items = Item::find($id);
        return view('items.edit')->with('items', $items);
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
            'description' => 'required',
            'stock' => 'required',
            'unit_of_issue' => 'required'
        ]);

        // Create Request
        $items = Item::find($id);
        $items->description = $request->input('description');
        $items->stock = $request->input('stock');
        $items->unit_of_issue = $request->input('unit_of_issue');
        $items->save();

        return redirect('/items')->with('success', 'Item Updated');
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
