<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\CostCenter;
use App\FundSource;
use App\Item;
use DB;

class SearchController extends Controller
{
    public function getSearch()
    {
        //get keywords input for search
        $filterBy = Input::get('filterBy');
        $searchInput = Input::get('searchInput');
        $quarter = Input::get('quarter');
        $type = Input::get('type');

        if($filterBy == 'costcenter_name'){
            $costcenters = CostCenter::select('id')->where($filterBy, $searchInput)->get();
            $id = $costcenters->pluck('id');
            
            if(count($costcenters) > 0){
                $items = DB::table('items')
                ->join('cost_centers','cost_centers.id','items.costcenter_id')
                ->join('fund_sources', 'fund_sources.id', 'items.fundsource_id')
                ->select(
                    'cost_centers.costcenter_name', 
                    'fund_sources.source', 
                    'items.description', 
                    'items.stock',
                    'items.unit_of_issue', 
                    'items.id', 
                    'items.costcenter_id', 
                    'items.fundsource_id',
                    'items.type',
                    'items.quarter',
                    'items.remark'
                )
                ->where('costcenter_id', $id)
                ->where('quarter', $quarter)
                ->where('type', $type)
                ->orderBy('items.id', 'asc')
                ->paginate(5);

                return view('results.costcenters')->with('success', 'Results found.')->with('items', $items);
            }else{
                return redirect('/items')->with('error', 'No results found.');
            }
        }elseif($filterBy == 'source'){
            $fundsources = FundSource::select('id')->where($filterBy, $searchInput)->get();
            $id = $fundsources->pluck('id');
            
            if(count($fundsources) > 0){
                $items = DB::table('items')
                ->join('cost_centers','cost_centers.id','items.costcenter_id')
                ->join('fund_sources', 'fund_sources.id', 'items.fundsource_id')
                ->select(
                    'cost_centers.costcenter_name', 
                    'fund_sources.source', 
                    'items.description', 
                    'items.stock',
                    'items.unit_of_issue', 
                    'items.id', 
                    'items.costcenter_id', 
                    'items.fundsource_id',
                    'items.type',
                    'items.quarter',
                    'items.remark'
                    )
                ->where('fundsource_id', $id)
                ->where('quarter', $quarter)
                ->where('type', $type)
                ->orderBy('items.id', 'asc')
                ->paginate(5);

                return view('results.fundsources')->with('success', 'Results found.')->with('items', $items);
            }else{
                return redirect('/items')->with('error', 'No results found.');
            }
            

            
        }
    }
}