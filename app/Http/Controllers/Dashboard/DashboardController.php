<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Cart1;
use App\Models\Chat;
use App\Models\CusOrder;
use App\Models\Order1;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function($request, $next){
           
            $this->user = Auth()->user();
            return $next($request);

        });
    }



    public function dashboard()

        {
           


            $user_id = auth()->user()->id;
            $messages = Chat::all();
        
        if(auth()->user()->Role == 'Admin')

               {
                $orders = Order1::all()->count();
                $c_order = CusOrder::all()->count();
                $total =  $orders + $c_order;
                $user = Customer::get()->count();


                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user'));
               }

            

        elseif(auth()->user()->Role == 'Supplier')
            {
                $user = User::where('Role','Manufacturer')->get()->count();
                $total = Order1::all()->count();
                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user'));
            
            }


        elseif(auth()->user()->Role == 'Manufacturer'){
            $total = Cart1::all()->count();
            $user = User::where('Role','Distributor')->get()->count();

                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user'));
            }

        elseif(auth()->user()->Role == 'Retailer' || auth()->user()->Role == 'Distributor'){
                
            $total = CusOrder::all()->count();
            $user = Customer::all()->count();
                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user'));
            }



    }





        public function master()
            {

                return view('Backend.Master.sidebar');
            }
   
}
