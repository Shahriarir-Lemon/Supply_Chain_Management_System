<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('Backend.Dashboard1.dashboard1');
    }
    public function master()
    {

        return view('Backend.Master.sidebar');
    }
   
}
