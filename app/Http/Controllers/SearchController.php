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
            // $costcenters = CostCenter::select('id')->where($filterBy, $searchInput)->get();
            $costcenters = CostCenter::where($filterBy, 'ILIKE', '%'.$searchInput.'%')->get();
            $id = $costcenters->pluck('id');
            
            if(count($costcenters) > 0){
                $items = DB::table('items')
                ->join('cost_centers','cost_centers.id','items.costcenter_id')
                ->join('fund_sources', 'fund_sources.id', 'items.fundsource_id')
                ->where('costcenter_name', 'ILIKE', '%'.$searchInput.'%')
                ->where('quarter', $quarter)
                ->where('type', $type)
                ->orderBy('items.id', 'asc')
                ->paginate(5);

                return view('results.costcenters')->with('success', 'Results found.')->with('items', $items);
            }else{
                return redirect('/items')->with('error', 'No results found.');
            }
        }elseif($filterBy == 'source'){
            $fundsources = FundSource::where($filterBy, 'ILIKE', '%'.$searchInput.'%')->get();
            $id = $fundsources->pluck('id');
            
            if(count($fundsources) > 0){
                $items = DB::table('items')
                ->join('cost_centers','cost_centers.id','items.costcenter_id')
                ->join('fund_sources', 'fund_sources.id', 'items.fundsource_id')
                ->where('source', 'ILIKE', '%'.$searchInput.'%')
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

    public function getSearchRequests()
    {
        //get keywords input for search
        $filterBy = Input::get('filterBy');
        $searchInput = Input::get('searchInput');
        $quarter = Input::get('quarter');
        $type = Input::get('type');

        if($filterBy == 'costcenter_name'){
            $costcenters = CostCenter::where($filterBy, 'LIKE', '%'.$searchInput.'%')->get();
            $id = $costcenters->pluck('id');
            
            if(count($costcenters) > 0){
                $purchaserequests = DB::table('purchase_requests')
                ->join('cost_centers','cost_centers.id','purchase_requests.costcenter_id')
                ->join('fund_sources', 'fund_sources.id', 'purchase_requests.fundsource_id')
                ->where('cost_centers.costcenter_name', 'ilike', '%'.$searchInput.'%')
                ->where('quarter', $quarter)
                ->where('type', $type)
                ->orderBy('purchase_requests.id', 'asc')
                ->paginate(5);

                return view('purchaserequests.costcenters')->with('success', 'Results found.')->with('purchaserequests', $purchaserequests);
            }else{
                return redirect('/purchaserequests')->with('error', 'No results found. :(');
            }
        }elseif($filterBy == 'source'){
            $fundsources = FundSource::where($filterBy, 'LIKE', '%'.$searchInput.'%')->get();
            $id = $fundsources->pluck('id');
            
            if(count($fundsources) > 0){
                $purchaserequests = DB::table('purchase_requests')
                ->join('cost_centers','cost_centers.id','purchase_requests.costcenter_id')
                ->join('fund_sources', 'fund_sources.id', 'purchase_requests.fundsource_id')
                ->where('source', 'ILIKE', '%'.$searchInput.'%')
                ->where('quarter', $quarter)
                ->where('type', $type)
                ->orderBy('purchase_requests.id', 'asc')
                ->paginate(5);

                return view('purchaserequests.fundsources')->with('success', 'Results found.')->with('purchaserequests', $purchaserequests);
            }else{
                return redirect('/purchaserequests')->with('error', 'No results found. :p');
            }
        }
    }
}