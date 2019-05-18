<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseRequest;
use PDF;
use DB;

class PDFController extends Controller
{
    public function downloadPDF($id){
        // $purchaserequests = PurchaseRequest::find($id);

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
  
        $pdf = PDF::loadView('purchaserequests.pdf', compact('purchaserequests', 'requestdetails'));
        return $pdf->download('invoice.pdf');

      }
}
