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

        if($filterBy == 'costcenter_name'){
            // $costcenters = CostCenter::where($filterBy , $searchInput)->get();
            
            $costcenters = CostCenter::select('id')->where($filterBy, $searchInput)->get();
            $id = $costcenters->pluck('id');
            // $items = Item::where('costcenter_id', $costcenter_id);
            $items = DB::table('items')
            ->join('cost_centers','cost_centers.id','items.costcenter_id')
            ->join('fund_sources', 'fund_sources.id', 'items.fundsource_id')
            ->select('cost_centers.costcenter_name', 'fund_sources.source', 'items.description', 'items.stock'
            ,'items.unit_of_issue', 'items.id', 'items.costcenter_id', 'items.fundsource_id')
            ->where('costcenter_id', $id)
            ->orderBy('items.id', 'asc')
            ->paginate(5);

            return view('results.costcenters')->with('items', $items);
        }elseif($filterBy == 'source'){
            $fundsources = FundSource::select('id')->where($filterBy, $searchInput)->get();
            $id = $fundsources->pluck('id');
            // $items = Item::where('costcenter_id', $costcenter_id);
            $items = DB::table('items')
            ->join('cost_centers','cost_centers.id','items.costcenter_id')
            ->join('fund_sources', 'fund_sources.id', 'items.fundsource_id')
            ->select('cost_centers.costcenter_name', 'fund_sources.source', 'items.description', 'items.stock'
            ,'items.unit_of_issue', 'items.id', 'items.costcenter_id', 'items.fundsource_id')
            ->where('fundsource_id', $id)
            ->orderBy('items.id', 'asc')
            ->paginate(5);

            return view('results.fundsources')->with('items', $items);
        }
    }
}