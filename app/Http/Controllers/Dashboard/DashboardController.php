<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('Dashboard.dashboard');
    }
    public function master()
    {

        return view('Master.sidebar');
    }
    public function store(Request $request)


    {
        // dd($request->all());


        Product::Create([
            'Name' => $request->name,
            'Email' => $request->email,
        ]);
        return redirect()->route('land');
    }
}
