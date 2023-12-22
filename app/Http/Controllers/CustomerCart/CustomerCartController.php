<?php

namespace App\Http\Controllers\CustomerCart;


use App\Http\Controllers\Controller;
use App\Models\CCart;
use App\Models\CusOderDetail;
use App\Models\CusOrder;
use App\Models\Product;
use App\Models\User;
use App\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CustomerCartController extends Controller
{

            public $user;

            public function __construct()
            {
                $this->middleware(function($request, $next){
                
                    $this->user = Auth()->user();
                    return $next($request);

                });
            }




  
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

                $product->update([
                    'Stock' => $product->Stock - ($newQuantity - $oldQuantity),
                ]);

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

                $product->update([
                    'Stock' => $product->Stock - $newq,
                ]);

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

        $product = Product::find($cart->product_id);




      //  if($product!=null)
       // {
            $product->update([
                'Stock' =>$cart->quantity + $product->Stock,
             ]);

      //  }

      


        $cart->delete();
        return redirect()->back();

       

    }



    public function cus_quantity_update(Request $request, $id)
    {


         //  dd($request);


         $cart = CCart::find($id);
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

 public function cus_checkout()
       {
           return view('Frontend.pages.cus_checkout');
       }



public function cus_place_order(Request $request)
        {


           // dd($request->all());
             $carts = CCart::all();
             $user = auth('customer')->user();
             $totalPrice = CCart::where('user_id', $user->id)->sum('price');

         
        $id = $user->id;

           $valid = Validator::make($request->all() ,[
                    'name'=> 'required|max:20',
                    'email'=> 'required|email',
                    'mobile'=>'required',
                    'address'=>'required',
                    
           ]);


           if($valid->fails())
           {
            return redirect()->back()->withErrors($valid)->withInput();
           }

          // dd($user->id, $totalPrice, $carts);
         $order= CusOrder::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'customer_id'=>$id,
            'delevery_status'=>'Processing',
            'total_price'=>$totalPrice,
            'payment_status'=>'Cash_On_Delivery',
         ]);


         foreach($carts as $cart)
         {
            
          CusOderDetail::create([
            'cus_order_id' =>$order->id,
            'product_name'=>$cart->product_name,
            'price'=> $cart->price / $cart->quantity,
            'quantity'=>$cart->quantity,
            'subtotal'=>$cart->price,

             ]);
         }
        //  $user = User::where('role', 'Supplier')->first();

     //     if (!$user->unreadNotifications->contains(function ($value, $key) use ($order)
         //    {
         //     return $value->data['order_id'] == $order->id;
         //    })) 
      //  {
            
        //    $user->notify(new DatabaseNotification($order));
       // }

         CCart::truncate();
         return redirect()->route('cus_cart_show')->with('success', 'Order Placed successfully');
         
      }



 public function cus_cancel_order($id)
        {
            
            
            $orders =CusOrder::find($id);

            CusOderDetail::where('cus_order_id', $id)->delete();


           CusOrder::find($id)->delete();

            return redirect()->back();


        }

      

}
 

