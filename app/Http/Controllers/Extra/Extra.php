<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use App\Models\CusOderDetail;
use App\Models\CusOrder;
use Illuminate\Http\Request;

class Extra extends Controller
{
    public function newPage(Request $request)
    {
        $order = CusOrder::all();
        $orders =CusOderDetail::all();
        
        $content = view('Backend.Cart.customer_order', compact('order','orders'))->render();


        return response()->json(['content' => $content]);
    }
}
