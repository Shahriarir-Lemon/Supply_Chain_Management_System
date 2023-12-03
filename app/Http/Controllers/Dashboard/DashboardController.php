<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
           // if (is_null($this-> user) || !$this->user->can('edit.product'))
          // {
           //     abort(403, ' Sorry !! You are not admin. To access the dashboard contact with Admin.');
           // }
                 
        //   $user = auth()->user();
          // $count = Cart::where('user_id', $user->id)->count();


            return view('Backend.Dashboard1.dashboard1');
        }


        public function master()
            {

                return view('Backend.Master.sidebar');
            }
   
}
