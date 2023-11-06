<?php

namespace App\Http\Controllers\Manage;


use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
      public function manage_category()
      {
        $products = Product::paginate(3);
        return view('Manage.manage', compact('products'));
      }
}
