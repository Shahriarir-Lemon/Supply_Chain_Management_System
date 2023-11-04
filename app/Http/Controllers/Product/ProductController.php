<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Exception;

use App\Http\Controllers\Controller;
use Exception as GlobalException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function product_list()
    {

        $products = Product::paginate(5);
        return view('Product.product_list', compact('products'));
    }

    public function add_product()
    {
        return view('Product.product_form');
    }
    public function product_store(Request $request)

    {
        //  dd($request->all());


        $validate = Validator::make($request->all(), [
            'product_image' => 'required|image|max:5000',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_unit' => 'required',
            'Category' => 'required',
           
        ]);

        $photo = time().$request->file('product_image')->getClientOriginalName();
         $path = $request-> file('product_image')->storeAs('product_images', $photo, 'public');     
          

        $data = [
             'Product_Image' => '/storage/'.$path,
            'Product_Name' => $request->input('product_name'),
            'Price' => $request->input('product_price'),
            'Unit_Type' => $request->input('product_unit'),
            'Category' => $request->input('product_category'),
            'Stock' => $request->input('product_stock'),

        ];

        try {
            Product::create($data);


            return redirect()->route('product_list')->with('success', 'Account Created Successfully');
        } catch (GlobalException $e) {

            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back()->withInput();
        }
    }
}
