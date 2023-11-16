<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $products = Product::get();
        
       
      return view('Frontend.pages.home', compact('products'));

    }
}