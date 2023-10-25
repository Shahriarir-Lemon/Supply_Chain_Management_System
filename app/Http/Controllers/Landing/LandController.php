<?php

namespace App\Http\Controllers\Landing;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandController extends Controller
{
    public function land()
    {

        $products = Product::all();

        return view('Landing.land', compact('products'));
    }
}
