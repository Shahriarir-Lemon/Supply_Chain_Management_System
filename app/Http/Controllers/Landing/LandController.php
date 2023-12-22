<?php

namespace App\Http\Controllers\Landing;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function($request, $next){
           
            $this->user = Auth()->user();
            return $next($request);

        });
    }


    public function land()
    {

        $products = Product::all();

        return view('Backend.Landing.land', compact('products'));
    }
}
