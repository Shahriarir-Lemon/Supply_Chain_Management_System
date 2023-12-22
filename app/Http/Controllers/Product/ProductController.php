<?php

namespace App\Http\Controllers\Product;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception as GlobalException;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart1;
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

        $role = 'Retailer';
        $products = Product::where('upload', $role)->get();
     
        $units = Unit::get();
        $categories = Category::get();
        return view('Backend.Product.table', compact('products','units' ,'categories'));
    }

    public function add_product()
    {


     //   if (is_null($this-> user) || !$this->user->can('edit.product'))
      //  {
      //      abort(403, 'Unauthrorized Access');
      //  }

        
        $categories = Category::get();
        $units = Unit::get();
        
        return view('Backend.Product.form', compact('categories','units'));
    }
    
    public function product_store(Request $request)

    {
        $categoryName = $request->input('product_category');

        $category = Category::where('Category_Name', $categoryName)->first();
       
         // dd($request->all());



    if ($category) 
    {
        $validate = Validator::make($request->all(), [
            
            'product_image' => 'required|image',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_unit' => 'required',
            'product_category' => 'required',
            'product_stock' => 'required',
            'product_description' => 'required',

           
        ]);

        if($validate->fails())
        {

            return redirect()->back()->withErrors($validate)->withInput();
        }


        $photo = time().$request->file('product_image')->getClientOriginalName();
        $path = $request->file('product_image')->storeAs('product_images', $photo, 'public');     
          
         $upload = auth()->user();
        $data = [
             'Product_Image' => '/storage/'.$path,
             
            'Product_Name' => $request->input('product_name'),
            'Price' => $request->input('product_price'),
            'Unit_Type' => $request->input('product_unit'),
            'Category' => $request->input('product_category'),
            'Stock' => $request->input('product_stock'),
            'Description' => $request->input('product_description'),
            'category_id'=> $category->id,
            'upload' => $upload->Role,

        ];

        try {
            Product::create($data);


            return redirect()->route('product_list')->with('success', 'Product added successfully');
            

        }
         catch (\Exception $e) {

            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back()->withInput();
        }


    }
        return redirect()->back()->with('success', 'Category Not Found');



}




    public function update_product($id, Request $request)
     {

           if (is_null($this-> user) || !$this->user->can('edit.product'))
                {
                    abort(403, 'Unauthrorized Access');
                }



            $product = Product::find($id);

            $validate = Validator::make($request->all(), [
                'product_image' => 'sometimes|image|max:5000',
                'product_name' => 'required|string|unique:products,Product_Name,'.$id,
                'product_price' => 'required',
                'product_unit' => 'required',
                'product_category' => 'required',
                'product_stock' => 'required',
                'product_description' => 'required',

                
            ]);

            if ($validate->fails())
             {
                return redirect()->back()->withErrors($validate)->withInput();
            }


            $data = [];


            if ($request->hasFile('product_image'))
             {
               
                $photo = time() . $request->file('product_image')->getClientOriginalName();
                
               
                $path = $request->file('product_image')->storeAs('product_images', $photo, 'public');
            
                
                $data['Product_Image'] = '/storage/' . $path;
            }

        // Update other fields
        $data['Product_Name'] = $request->input('product_name');
        $data['Price'] = $request->input('product_price');
        $data['Unit_Type'] = $request->input('product_unit');
        $data['Category'] = $request->input('product_category');
        $data['Stock'] = $request->input('product_stock');
        $data['Description'] = $request->input('product_description');

        $product->update($data);

        return redirect()->route('product_list');


   }



    public function delete_product($id)
    {
        dd($id);
        $product = Product::find($id);
        $product->delete(); 

        return redirect()->route('product_list');
    }





    public function add_cart1(Request $request, $id)
    {

       
            $user = auth()->user();
            $product = Product::find($id);
            $cart3 = Cart1::where('user_id', $user->id)->where('product_id', $id)->first();
        
            if ($cart3) 
            {
                if($cart3->approve_status != 'Canceled')
                {
                    $oldQuantity = $cart3->quantity;
                    $new = $request->quantity;

                    $newQuantity = $oldQuantity + $new;
                    $cart3->quantity = $newQuantity;

                    $cart3->price = $product->Price * $newQuantity;

                    $cart3->save();

                    $product->update([
                        'Stock' => $product->Stock - ($newQuantity - $oldQuantity),
                    ]);
                    
                    return redirect()->back()->with('success', 'Product Updated Successfully.');
                }
                else
                {
                    $cart = new Cart1();

                    $cart->name = $user->user_name;
    
                    $cart->email = $user->email;
    
                    $cart->address = $user->Adress;
    
                    $cart->product_name = $product->Product_Name;
                    $newq = $request->quantity;
    
                    $cart->price = $product->Price *  $newq;
    
                    $cart->quantity = $request->quantity;
    
                    $cart->image = $product->Product_Image;
    
                    $cart->product_id = $product->id;
    
                    $cart->user_id = $user->id;
    
                    $product->update([
                        'Stock' => $product->Stock - $newq,
                    ]);
                    
    
                    $cart->save();
    
            
                    return redirect()->back()->with('success', 'Product Added Successfully.');
                }

            }
             else 
            {
                $cart = new Cart1();

                $cart->name = $user->user_name;

                $cart->email = $user->email;

                $cart->address = $user->Adress;

                $cart->product_name = $product->Product_Name;
                $newq = $request->quantity;

                $cart->price = $product->Price *  $newq;

                $cart->quantity = $request->quantity;

                $cart->image = $product->Product_Image;

                $cart->product_id = $product->id;

                $cart->user_id = $user->id;

                $product->update([
                    'Stock' => $product->Stock - $newq,
                ]);
                

                $cart->save();

        
                return redirect()->back()->with('success', 'Product Added Successfully.');
            }
        
    
            
        }

 public function cart_show1()
        {

            $user = auth()->user();
            $carts = Cart1::where('user_id', $user->id)->get();
            $product = Product::all();



            return view('Backend.Distributor.cart_show',compact('carts','product'));

        }

 public function remove_cart1($id)
        {
            
            $cart=Cart1::find($id);

            $product = Product::find($cart->product_id);


            $product->update([
                'Stock' =>$cart->quantity + $product->Stock,
            ]);


            $cart->delete();
            return redirect()->back();

           

        }

 public function quantity_update1($id, Request $request)
          {

          //  dd($request);


          $cart = Cart1::find($id);
                $product = Product::where('id', $cart->product_id)->first();


              
                    $u = ( $request->input('quantity') - $cart->quantity );
                

                $product->update([
                    'Stock' => $product->Stock - $u,
                ]);



                if ($product)
                 {
                    $cart->update([
                        'quantity' => $request->input('quantity'),
                        'price' => $product->Price * $request->input('quantity'),
                    ]);
                    return redirect()->back();
                } 

                else 
                {
                    
                    return redirect()->back();
                }

        }


        public function request_product()
        {
            return redirect()->back();

        }
        public function all_request()
        {


            $cart = Cart1::all();
            return view('Backend.Distributor.distributor_request',compact('cart'));

        }

        public function approve_request($id)
        {


            $cart = Cart1::find($id);

            $cart->update([

                'approve_status'=> 'Approved',

            ]);
            return redirect()->back();

        }

        public function cancel_request($id)
        {


            $cart = Cart1::find($id);

            $cart->update([

                'approve_status'=> 'Canceled',

            ]);
            return redirect()->back();

        }

        public function available_product()
        {


            $cart = Cart1::where('approve_status', 'Approved')->get();
            return view('Backend.Distributor.availavle_product',compact('cart'));

        }

 public function manu_report(Request $request)
        {


                $carts = Cart1::where('approve_status', 'Approved')->get();

                $today = Carbon::now()->format('Y-m-d');

                switch ($request->report) 
                {
                    case 'daily':

                        $startDate = Carbon::now()->startOfDay();
                        $endDate = Carbon::now()->endOfDay();
                        break;


                    case 'weekly':
                        $startDate = Carbon::now()->startOfWeek();
                        $endDate = Carbon::now()->endOfWeek();
                        break;

                    case 'monthly':

                        $startDate = Carbon::now()->startOfMonth();
                        $endDate = Carbon::now()->endOfMonth();
                        break;

                    default:
                        // Default to daily if an invalid type is provided
                        $startDate = Carbon::now()->startOfDay();
                        $endDate = Carbon::now()->endOfDay();
                        break;
                }

                $filteredCarts = $carts->whereBetween('created_at', [$startDate, $endDate]);

                $data = [
                    'carts' => $filteredCarts,
                    'startDate' => $startDate->format('Y-m-d'),
                    'endDate' => $endDate->format('Y-m-d'),
                    'today' => $today,
                ];

                $pdf = Pdf::loadView('Backend.Cart.manu_report', $data);

                $fileName = 'Report-' . auth()->user()->user_name . '-' . $request->report . '.pdf';

                return $pdf->download($fileName);

        }



    
}
