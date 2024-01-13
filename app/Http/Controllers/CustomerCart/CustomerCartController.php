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

               
                return redirect()->back()->with('success1', 'Product Updated Successfully.');

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

                

                return redirect()->back()->with('success1', 'Product Added Successfully.');
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
        return redirect()->back()->with("success1","Removed Successfully");

       

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
             return redirect()->back()->with("success1","Quantity Updated Successfully");
         } 

         else 
         {
             
             return redirect()->back()->with("success1","Quantity Updated Successfully");
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
            include('SweetAlert.flash');
            return redirect()->back()->withInput();
           }

          // dd($user->id, $totalPrice, $carts);
         $order= CusOrder::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'customer_id'=>$id,
            'delevery_status'=>'Pending',
            'total_price'=>$totalPrice,
            'payment_status'=>'Cash',
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
       

         CCart::where('user_id', auth()->guard('customer')->user()->id)->delete();


         $auth = auth()->guard('customer')->user();
         $admins = User::where('Role', 'Admin')->get();

         $manufacturer = User::where('Role', 'Retailer')->get();
     
         $users = $admins->merge($manufacturer);
     
         foreach ($users as $user)
         {
             $user->notify(new DatabaseNotification($auth));

         }



       
         return redirect()->route('profile_view')->with('success1', 'Order Placed successfully');
         
      }



 public function cus_cancel_order($id)
        {
            
            
            $orders =CusOrder::find($id);



            $detail = CusOderDetail::where('cus_order_id', $id)->get();


            foreach($detail as $details)
            {


            $change = Product::where('upload', 'Retailer')->where('Product_Name', $details->product_name)->first();
               // dd($change);
           
                $change->update([
                  
                    'Stock'=> $details->quantity + $change->Stock,
    
                ]);
       
               

            }

           CusOderDetail::where('cus_order_id', $id)->delete();


           CusOrder::find($id)->delete();

            return redirect()->back()->with("success1","Order cancel Successfully");;


        }
    
public function cus_delivery_change(Request $request, $id)
        {
            
        
        //  dd($id);
            $order = CusOrder::find($id);
            $orders = CusOderDetail::where('cus_order_id', $id)->get();



         if($order)
         {

   

            $order->update([
                  
                'delevery_status'=> $request->status,

            ]);

        }
           

            return redirect()->back()->with("success1","Status Changed Successfully");;


        }



    public function cus_checkout1()
        {
            return view('Frontend.pages.cus_checkout1');
        }

      

}
 

