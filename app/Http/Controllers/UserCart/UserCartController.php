<?php

namespace App\Http\Controllers\UserCart;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Customer;
use App\Models\Cart;
use App\Models\CusOderDetail;
use App\Models\CusOrder;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use App\Models\OrderDetails;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\DatabaseNotification;
use App\Models\Order1;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
        public $user;

        public function __construct()
        {
            $this->middleware(function($request, $next){
            
                $this->user = Auth()->user();
                return $next($request);

            });
        }




    public function add_cart(Request $request, $id)
    {

       
            $user = auth()->user();
            $material = Material::find($id);
            $cart3 = Cart::where('user_id', $user->id)->where('material_id', $id)->first();
        
            if ($cart3) 
            {
                $oldQuantity = $cart3->quantity;
                $new = $request->quantity;

                $newQuantity = $oldQuantity + $new;
                $cart3->quantity = $newQuantity;

                $cart3->price = $material->Price * $newQuantity;

                $cart3->save();

                $material->update([
                    'Stock' => $material->Stock - ($newQuantity - $oldQuantity),
                ]);
                
                return redirect()->back()->with('success1', 'Product Added Successfully.');

            }
             else 
            {
                $cart = new Cart();

                $cart->name = $user->user_name;

                $cart->email = $user->email;

                $cart->address = $user->Adress;

                $cart->material_name = $material->Material_Name;
                $newq = $request->quantity;

                $cart->price = $material->Price *  $newq;

                $cart->quantity = $request->quantity;

                $cart->image = $material->Material_Image;

                $cart->material_id = $material->id;

                $cart->user_id = $user->id;

                $material->update([
                    'Stock' => $material->Stock - $newq,
                ]);
                

                $cart->save();

                

              


                return redirect()->back()->with('success1', 'Product Added Successfully.');
            }
        
    
            
        }

 public function cart_show()
        {
            if (is_null($this-> user) || !$this->user->can('supplier.view'))
            {
                abort(403, 'Unauthrorized Access');
            }
            if (is_null($this-> user) || !$this->user->can('distributor.view'))
            {
                abort(403, 'Unauthrorized Access');
            }
            if (is_null($this-> user) || !$this->user->can('retailer.view'))
            {
                abort(403, 'Unauthrorized Access');
            }


            $user = auth()->user();
            $carts = Cart::where('user_id', $user->id)->get();
            $material = Material::all();



            return view('Backend.Cart.manufacturer',compact('carts','material'));

        }

 public function remove_cart($id)
        {
            
            $cart=Cart::find($id);

            $material = Material::find($cart->material_id);


            $material->update([
                'Stock' =>$cart->quantity + $material->Stock,
            ]);


            $cart->delete();
            return redirect()->back()->with("success1","Items Removed Successfully");;

           

        }

 public function quantity_update($id, Request $request)
          {

          //  dd($request);


          $cart = Cart::find($id);
                $material = Material::where('id', $cart->material_id)->first();


              
                    $u = ( $request->input('quantity') - $cart->quantity );
                

                $material->update([
                    'Stock' => $material->Stock - $u,
                ]);



                if ($material)
                 {
                    $cart->update([
                        'quantity' => $request->input('quantity'),
                        'price' => $material->Price * $request->input('quantity'),
                    ]);
                    return redirect()->back()->with("success1","Quantity Updated Successfully");;
                } 

                else 
                {
                    
                    return redirect()->back()->with("success1","Quantity Not Found");;
                }

        }
        

    public function chechout()
        {
            return view('Backend.Cart.checkout');
        }

        
 public function place_order(Request $request)
        {


           // dd($request->all());
             $carts = Cart::all();
             $user = Auth::user();
             $totalPrice = Cart::where('user_id', $user->id)->sum('price');


           $valid = Validator::make($request->all() ,[
                    'name'=> 'required|max:20',
                    'email'=> 'required|email',
                    'mobile'=>'required',
                    'address'=>'required',
                    
           ]);


           if($valid->fails())
           {
            include('SweetAlert.flash');
            return redirect()->back()->withErrors($valid)->withInput();
           }


         $order= Order1::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'user_id'=>auth()->user()->id,
            'delevery_status'=>'Processing',
            'total_price'=>$totalPrice,
            'payment_status'=>'Cash_On_Delivery',
         ]);


         foreach($carts as $cart)
         {
            
          OrderDetails::create([
            'order1_id' =>$order->id,
            'product_name'=>$cart->material_name,
            'price'=> $cart->price / $cart->quantity,
            'quantity'=>$cart->quantity,
            'subtotal'=>$cart->price,

             ]);
         }
         Cart::truncate();


        


         if (auth()->user()->Role == 'Manufacturer') 
                {

                    $auth = auth()->user();
                    $admins = User::where('Role', 'Admin')->get();

                    $suppliers = User::where('Role', 'Supplier')->get();

                
                    $users = $admins->merge($suppliers);
                
                    foreach ($users as $user)
                    {
                        $user->notify(new DatabaseNotification($auth));

                    }
                    
                }
        elseif(auth()->user()->Role == 'Distributor')
                {

                
                       $auth = auth()->user();
                        $admins = User::where('Role', 'Admin')->get();

                        $manufacturer = User::where('Role', 'Manufacturer')->get();
                    
                        $users = $admins->merge($manufacturer);
                    
                        foreach ($users as $user)
                        {
                            $user->notify(new DatabaseNotification($auth));

                        }
                           
                }


           else

                {
                    $auth = auth()->user();
                    $admins = User::where('Role', 'Admin')->get();

                    $distributor = User::where('Role', 'Distributor')->get();
                
                    $users = $admins->merge($distributor);
                
                    foreach ($users as $user)
                    {
                        $user->notify(new DatabaseNotification($auth));

                    }
                }


        
        
             return redirect()->back()->with('success1', 'Order Placed successfully');


          }

public function customer_order()
          {
            
            if (is_null($this-> user) || !$this->user->can('supplier.view'))
                {
                        abort(403, 'Unauthrorized Access');
    
                }

          if (is_null($this-> user) || !$this->user->can('manufacturer.view'))
                {
                        abort(403, 'Unauthrorized Access');
    
                }
         if (is_null($this-> user) || !$this->user->can('distributor.view'))
                {
                  abort(403, 'Unauthrorized Access');
            
                 }

              $order = CusOrder::all();
              $orders =CusOderDetail::all();
  
              return view('Backend.Cart.customer_order',compact('orders','order'));
  
  
          }     



public function cus_status_change(Request $request, $id)
        {
            
            
            
        //  dd($id);
            $order = CusOrder::find($id);
            $orders = CusOderDetail::where('cus_order_id', $id)->get();


            $order->update([
                  
                'order_status'=> $request->status,

            ]);
            foreach ($orders as $orderDetail) 
            {
                $orderDetail->update([
                    'status' => $request->status,
                ]);
            }

            return redirect()->back()->with("success1","Status Changed Successfully");;


        }
     public function manufacturer_order()
        {
            if (is_null($this-> user) || !$this->user->can('manufacturer.view'))
            {
                    abort(403, 'Unauthrorized Access');

            }
            if (is_null($this-> user) || !$this->user->can('distributor.view'))
            {
                abort(403, 'Unauthrorized Access');
            }
            if (is_null($this-> user) || !$this->user->can('retailer.view'))
            {
                    abort(403, 'Unauthrorized Access');
    
            }


            $order = Order1::all();
            $orders =OrderDetails::all();

            return view('Backend.Cart.manufacurer_order',compact('orders','order'));


        }  

    public function manufacturer_profile()
    {

        if (is_null($this-> user) || !$this->user->can('supplier.view'))
        {
            abort(403, 'Unauthrorized Access');
        }
        if (is_null($this-> user) || !$this->user->can('distributor.view'))
        {
            abort(403, 'Unauthrorized Access');
        }
        if (is_null($this-> user) || !$this->user->can('retailer.view'))
        {
                abort(403, 'Unauthrorized Access');

        }
        


        $orders =Order1::all();
        return view('Backend.Cart.manufacturer_profile',compact('orders'));
    }
       
    public function manufacturer_status_change(Request $request, $id)
        {
            
        
        //  dd($id);
            $order = Order1::find($id);
            $orders = OrderDetails::where('order1_id', $id)->get();


            $order->update([
                  
                'order_status'=> $request->status,

            ]);
            foreach ($orders as $orderDetail) 
            {
                $orderDetail->update([
                    'status' => $request->status,
                ]);
            }
          

            return redirect()->back()->with("success1","Status Changed Successfully");;


        }
public function manu_cancel_order($id)
        {
            
            
            $orders =Order1::find($id);

            OrderDetails::where('order1_id', $id)->delete();


           Order1::find($id)->delete();

            return redirect()->back()->with("success1","Order Canceled Successfully");;


        }
public function manu_invoice($id)
        {

            $orders =Order1::find($id);

            $today = Carbon::now()->format('Y-m-d');

            $details = OrderDetails::where('order1_id',$id)->get();
            
          // return view('Backend.Cart.manu_invoice',compact('orders','today','details'));

            $data = [
                'orders' => $orders,
                'today' => $today,
                'details' =>$details,
               
            ];

            $pdf = Pdf::loadView('Backend.Cart.manu_invoice', $data);

            return $pdf->download('invoice of-'.$orders->name.'.pdf');
        }

    
public function retailer_report(Request $request)
        
            {


                $order = CusOrder::where('order_status', 'Approved')->get();
                $orders = CusOderDetail::where('status', 'Approved')->get();

           //   $orders =CusOderDetail::all();


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

                $filteredCart = $order->whereBetween('created_at', [$startDate, $endDate]);
                $filteredCarts = $orders->whereBetween('created_at', [$startDate, $endDate]);

                $data = [

                    'order' => $filteredCart,

                    'orders' => $filteredCarts,
                    'startDate' => $startDate->format('Y-m-d'),
                    'endDate' => $endDate->format('Y-m-d'),
                    'today' => $today,
                ];

                $pdf = Pdf::loadView('Backend.Cart.retailer_report', $data);

                $fileName = 'Report-' . auth()->user()->user_name . '-' . $request->report . '.pdf';

                return $pdf->download($fileName);
        }

public function supplier_report(Request $request)
        
            {


                $order = Order1::where('order_status', 'Approved')->get();
                $orders = OrderDetails::where('status', 'Approved')->get();

           //   $orders =CusOderDetail::all();


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

                $filteredCart = $order->whereBetween('created_at', [$startDate, $endDate]);
                $filteredCarts = $orders->whereBetween('created_at', [$startDate, $endDate]);

                $data = [

                    'order' => $filteredCart,

                    'orders' => $filteredCarts,
                    'startDate' => $startDate->format('Y-m-d'),
                    'endDate' => $endDate->format('Y-m-d'),
                    'today' => $today,
                ];

                $pdf = Pdf::loadView('Backend.Cart.supplier_report', $data);

                $fileName = 'Report-' . auth()->user()->user_name . '-' . $request->report . '.pdf';

                return $pdf->download($fileName);
        }
    
        
}
