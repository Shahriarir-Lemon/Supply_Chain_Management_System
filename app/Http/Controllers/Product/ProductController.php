<?php

namespace App\Http\Controllers\Product;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use Exception as GlobalException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Type\Integer;

class ProductController extends Controller
{
    
    public $user;

    public function __construct()
    {
        $this->middleware(function($request, $next){
           
            $this->user = Auth()->user();
            return $next($request);

        });
    }




    public function product_list()
    {

        $products = Product::paginate(3);
        $units = Unit::get();
        $categories = Category::get();
        return view('Backend.Product.product_list', compact('products','units' ,'categories'));
    }

    public function add_product()
    {
        $categories = Category::get();
        $units = Unit::get();
        
        return view('Backend.Product.product_form', compact('categories','units'));
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
            'Description' => $request->input('product_description'),

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


    public function view_product($id)
    {
      echo ($id);
      //  return view('Product.edit_product');
    }


    public function update_product($id, Request $request)
     {

           if (is_null($this-> user) || !$this->user->can('edit.product'))
                {
                    abort(403, 'Unauthrorized Access');
                }



            $product = Product::find($id);

            $validate = Validator::make($request->all(), [
                'product_name' => 'required|string|unique:products,Product_Name,'.$id,
                'product_price' => 'required',
                'product_unit' => 'required',
                'product_category' => 'required',
                'product_stock' => 'required',
                'product_image' => 'sometimes|image|max:5000',
            ]);

    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }

    // Handle file upload
    if ($request->hasFile('product_image')) {
        // Delete the old file if it exists
        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }

        // Upload the new file
        $photo = time() . $request->file('product_image')->getClientOriginalName();
        $path = $request->file('product_image')->storeAs('product_images', $photo, 'public');
       // $product->update(['Product_Image' => $path]);
    }

    // Update other fields
    $product->update([
        'Product_Image' => $path,
        'Product_Name' => $request->product_name,
        'Price' => $request->product_price,
        'Unit_Type' => $request->product_unit,
        'Category' => $request->product_category,
        'Stock' => $request->product_stock,
        'Description' => $request->product_description,
    ]);

    return redirect()->route('product_list');
}
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete(); 

        return redirect()->route('product_list');
    }

    
}
