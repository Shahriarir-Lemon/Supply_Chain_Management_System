<?php

namespace App\Http\Controllers;

use App\Models\CusOderDetail;
use App\Models\CusOrder;
use App\Models\Delivery;
use App\Models\Delivery1;
use App\Models\Order1;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;


class DeliveryController extends Controller
{
    public function delivery()
            {
                

            // return $users;
                $data = Delivery::all();

                $order = Order1::all();
                $orders =OrderDetails::all();
                $dataa =Delivery::all();
                
               return view('Delivery.delivery',compact('dataa','data','order','orders'));
            }


    public function delivery_form()
            {
    
           return view('Delivery.delivery_form');
             
            }


    public function delivery_create(Request $request)


            {
                $validator = Validator::make($request->all(), [
                    'user_name' => 'required|max:20',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required|unique:deliveries,phone',
                    'password' => 'required|confirmed',
                   
                ]);
    
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput();
                }
    
                $data = [
                    'user_name' => $request->input('user_name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'phone' => $request->input('phone'),
                    
                ];
    
                 Delivery::create($data);
    
                
    
                return redirect()->route('delivery')->with('success1', 'Delivery Man created successfully');
               }


public function delivery_delete($id)
               {
                   $user = Delivery::find($id);
                   $user->delete();
                   return redirect()->route('delivery')->with('success1', 'Deleted successfully');
               }


                      
public function man_change($id, $idd)
{
    
//
    //  dd($id);
    $order = Order1::find($idd);
    $orders = OrderDetails::where('order1_id', $idd)->get();
    $man = Delivery::find($id);




    $man->update([
          
        'status'=> 'Assigned',

    ]);
    $order->update([
        'man'=> $id,
    ]);
   
  

    return redirect()->back()->with("success1","Status Changed Successfully");;


}



    public function delivery1()
            {
                

            // return $users;
                $data = Delivery1::all();

                $order = CusOrder::all();
                $orders =CusOderDetail::all();
                $dataa =Delivery1::all();

               
                
            return view('Delivery.delivery1',compact('dataa','data','order','orders'));
            }


        public function delivery_form1()
            {

            return view('Delivery.delivery_form1');
            
            }


    public function delivery_create1(Request $request)


            {
                $validator = Validator::make($request->all(), [
                    'user_name' => 'required|max:20',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required|unique:deliveries,phone',
                    'password' => 'required|confirmed',
                
                ]);

                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = [
                    'user_name' => $request->input('user_name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'phone' => $request->input('phone'),
                    
                ];

                Delivery1::create($data);

                

                return redirect()->route('delivery1')->with('success1', 'Delivery Man created successfully');
            }


    public function delivery_delete1($id)
            {
                $user = Delivery1::find($id);
                $user->delete();
                return redirect()->route('delivery1')->with('success1', 'Deleted successfully');
            }


                    
     public function man_change1($id, $idd)
            {

            //
            //  dd($id);
            $order = CusOrder::find($idd);
            $orders = CusOderDetail::where('cus_order_id', $idd)->get();
            $man = Delivery1::find($id);




            $man->update([

            'status'=> 'Assigned',

            ]);
            $order->update([
            'man'=> $id,
            ]);



            return redirect()->back()->with("success1","Status Changed Successfully");;


            }
   
}
