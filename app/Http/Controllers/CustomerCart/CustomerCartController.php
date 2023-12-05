<?php

namespace App\Http\Controllers\CustomerCart;

use App\Http\Controllers\Controller;
use App\Models\CCart;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerCartController extends Controller
{
  
    public function cus_add_cart(Request $request,$id)
    {
       
        $user = auth('customer')->user();
            $product = Product::find($id);
            $cart1 = CCart::where('user_id', $user->id)->where('product_id', $id)->first();
        
            if ($cart1) 
            {
                $oldQuantity = $cart1->quantity;
                $new = $request->quantity;

                $newQuantity = $oldQuantity + $new;
                $cart1->quantity = $newQuantity;

                $cart1->price = $product->Price * $newQuantity;

                $cart1->save();

               
                return redirect()->back()->with('success', 'Product Updated Successfully.');

            }
             else 
            {
                $cart = new CCart();

                $cart->name = $user->c_fullname;

                $cart->email = $user->c_email;

                $cart->address = $user->c_address;

                $cart->product_name = $product->Product_Name;
                $newq = $request->quantity;

                $cart->price = $product->Price *  $newq;

                $cart->quantity = $request->quantity;

                $cart->image = $product->Product_Image;

                $cart->product_id = $product->id;

                $cart->user_id = $user->id;

                $cart->save();

                

                return redirect()->back()->with('success', 'Product Added Successfully.');
            }
        
    
            
        }


    public function cus_cart_show()
    {

        $user = auth('customer')->user();
            $carts = CCart::where('user_id', $user->id)->get();
            $product = Product::all();



            return view('Frontend.pages.cart',compact('carts','product'));
    }


    public function cus_remove_cart($id)
    {
        
        $cart=CCart::find($id);

        $product = Product::find($cart->material_id);


      //  $product->update([
      //      'Stock' =>$cart->quantity + $product->Stock,
      //  ]);


        $cart->delete();
        return redirect()->back();

       

    }
 }

