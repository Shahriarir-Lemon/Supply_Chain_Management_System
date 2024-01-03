<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Cart1;
use App\Models\Category;
use App\Models\Chat;
use App\Models\CusOrder;
use App\Models\Material;
use App\Models\Order1;
use App\Models\Store;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\DB;

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

                $recent = CusOrder::latest()->take(4)->get();
                $orders = Order1::all()->count();
                $c_order = CusOrder::all()->count();
                $total =  $orders + $c_order;
                $user = Customer::get()->count();
                
                $totals = CusOrder::where('order_status','Approved')->get();
                $price = 0;
                foreach($totals as $total1)
                {
                    $price = $price +  $total1->total_price;
                }


                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user','recent','price'));
               }

            

        elseif(auth()->user()->Role == 'Supplier')
            {
                $recent = Order1::latest()->take(4)->get();
                $user = User::where('Role','Manufacturer')->get()->count();
                $total = Order1::all()->count();

                $totals = Order1::where('order_status','Approved')->get();
                $price = 0;
                foreach($totals as $total1)
                {
                    $price = $price +  $total1->total_price;
                }


                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user','recent','price'));
            
            }


        elseif(auth()->user()->Role == 'Manufacturer'){

            $recent = Cart1::latest()->take(4)->get();

            $total = Cart1::all()->count();
            $user = User::where('Role','Distributor')->get()->count();
            $totals = Cart1::where('approve_status','Approved')->get();
            $price = 0;
            foreach($totals as $total1)
            {
                $price = $price +  $total1->price;
            }


                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user','recent','price'));
            }

        elseif(auth()->user()->Role == 'Retailer'){


            $recent = CusOrder::latest()->take(4)->get();
            $total = CusOrder::all()->count();
            $user = Customer::all()->count();

            $totals = CusOrder::where('order_status','Approved')->get();
            $price = 0;
            foreach($totals as $total1)
            {
                $price = $price +  $total1->total_price;
            }   

                return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user','recent','price'));
            }
        elseif(auth()->user()->Role == 'Distributor'){


                $recent = Store::latest()->take(4)->get();
                $total = Store::all()->count();
                $user = User::where('Role','Retailer')->get()->count();


                $totals = Store::where('approve_status','Approved')->get();
                $price = 0;
                foreach($totals as $total1)
                {
                    $price = $price +  ($total1->price * $total1->quantity);
                }
    
                    return view('Backend.Dashboard1.dashboard1', compact('user_id', 'messages','total','user','recent','price'));
                }


    }





public function master()
            {

                return view('Backend.Master.sidebar');
            }


    public function matetial_search(Request $request)
            {


                
                $data = $request->input('search');
            
                $materials= DB::table('materials')->where('Material_Name', 'like', '%' . $data . '%')->get();
                $count= DB::table('materials')->where('Material_Name', 'like', '%' . $data . '%')->count();
            
    
                $units = Unit::get();

             

                
                return view('Backend.Raw_Materials.search', compact('count' ,'materials', 'units'));
            }


 public function product_search(Request $request)
            {


                
                $data = $request->input('search');
            
                $materials= DB::table('materials')->where('Material_Name', 'like', '%' . $data . '%')->get();
                $count= DB::table('materials')->where('Material_Name', 'like', '%' . $data . '%')->count();
            

                $role1 = 'Admin';
                $role2 = 'Supplier';
                $role3 = 'Manufacturer';
                $role4 = 'Distributor';
                $role5 = 'Retailer';
        
                if(auth()->user()->Role == $role1)
                    {
                        $products = DB::table('products')->where('Product_Name', 'like', '%' . $data . '%')->get();
                        $count =  DB::table('products')->where('Product_Name', 'like', '%' . $data . '%')->count();
                    }
                elseif(auth()->user()->Role == $role2)
                    {
                        $products = DB::table('products')->where('Product_Name', 'like', '%' . $data . '%')->get();
                        $count =  DB::table('products')->where('Product_Name', 'like', '%' . $data . '%')->count();
                    }
                elseif(auth()->user()->Role == $role3)
                    {
                        $products = Product::where('upload', $role3)->where('Product_Name', 'like', '%' . $data . '%')->get();
                        $count =  DB::table('products')->where('upload', $role3)->where('Product_Name', 'like', '%' . $data . '%')->count();
                    }
                elseif(auth()->user()->Role == $role4)
                    {
                        $products = Product::where('upload', $role3)->where('Product_Name', 'like', '%' . $data . '%')->get();
                        $count =  DB::table('products')->where('upload', $role3)->where('Product_Name', 'like', '%' . $data . '%')->count();
                    }
                    else
                        {
                            $products = Product::where('upload', $role4)->where('Product_Name', 'like', '%' . $data . '%')->get();
                            $count =  DB::table('products')->where('upload', $role4)->where('Product_Name', 'like', '%' . $data . '%')->count();
                        }
    
                $units = Unit::get();
                $categories = Category::get();
             

                
                return view('Backend.Product.search', compact('count' ,'categories', 'units','products'));
            }


            



   
}
