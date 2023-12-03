<?php

namespace App\Http\Controllers\Cart_and_payment;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function view_cart()
   {

     return view('Frontend.pages.cart');

   }


   public function add_to_cart($product_id)
   {
       $product = Product::find($product_id);

       $cart = session()->get('view_card');

       if($cart)
       {
            if(array_key_exists($product_id,$cart))
            {

                $cart[$product_id]['quantity'] = $cart[$product_id]['quantity'] + 1;
                $cart[$product_id]['subtotal'] = $cart[$product_id]['quantity'] * $cart[$product_id]['price'];
            
            session()->put('view_card', $cart);
            notify()->success('Product Updated Successfully');

            return redirect()->back();
            }

         else
            {
                $cart[$product_id] = [
                    'id'=> $product_id,
                    'image'=> $product->Product_Image,
                    'name'=> $product->Product_Name,
                    'category' => $product->Category,
                    'price'=>$product->Price,
                    'quantity'=>1,
                    'subtotal'=>1 * $product->Price,
                ];
                  session()->put('view_card', $cart);
                  notify()->success('Product Added Successfully');
                  return redirect()->back();
      
            }


       }


       else
       {
          $newcart[$product_id] = [
              'id'=> $product_id,
              'image'=> $product->Product_Image,
              'name'=> $product->Product_Name,
              'category' => $product->Category,
              'price'=>$product->Price,
              'quantity'=>1,
              'subtotal'=>1 * $product->Price,
          ];
            session()->put('view_card', $newcart);
            notify()->success('Product Added Successfully');

            return redirect()->back();


       }

          return view('Frontend.pages.cart');

   }


 



}
