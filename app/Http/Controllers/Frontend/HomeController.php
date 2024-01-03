<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
      public $user;

      public function __construct()
      {
          $this->middleware(function($request, $next){
            
              $this->user = Auth()->user();
              return $next($request);

          });
      }


    public function home()
    {

        $products = Product::where('upload','Retailer')->get();
        
       
      return view('Frontend.pages.home', compact('products'));

    }

    public function bakery_category($categoryId)
    {

      $category = Category::find($categoryId);
      $products = $category->products;

      return view('Frontend.pages.category', compact('category', 'products'));
     }

     
    public function popular_items()
    {

      $randomProducts = Product::inRandomOrder()->take(8)->get();

      return view('Frontend.pages.popular_items', compact('randomProducts'));
     }

     public function new_arrivals()
     {
 
       $new_arrivals = Product::latest()->take(8)->get();
 
       return view('Frontend.pages.new_arrivals', compact('new_arrivals'));
      }

}