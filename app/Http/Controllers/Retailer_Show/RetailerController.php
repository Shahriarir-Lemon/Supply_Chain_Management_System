<?php

namespace App\Http\Controllers\Retailer_Show;

use App\Http\Controllers\Controller;
use App\Models\Last;
use App\Models\Store;
use Illuminate\Http\Request;

class RetailerController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function($request, $next){
           
            $this->user = Auth()->user();
            return $next($request);

        });
    }

    public function retailer_show() 
    {

        if (is_null($this-> user) || !$this->user->can('admin.view'))
        {
            abort(403, 'Unauthrorized Access');
        }
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


        $products = Last::all();
        
        return view('Backend.RetailerShow.show_product',compact('products'));
    }


    public function retailer_request(Request $request,$id)
    {
        $products = Last::find($id);
    
        $new = new Store();
        
        $new->name = auth()->user()->user_name;
        $new->email = auth()->user()->email;
        $new->phone = auth()->user()->Phone;
        $new->address = auth()->user()->Adress;
        $new->product_name = $products->product_name;
        $new->price = $products->price / $products->quantity;
        $new->quantity = $request->quantity;
        $new->image = $products->image;
        $new->product_id = $products->product_id;
        $new->approve_status = 'Pending';
        $new->role = auth()->user()->Role;
        $new->user_id = auth()->user()->id;
    
        $new->save();
        return redirect()->back()->with('success1', 'Request Sent Successfully');
    }

    public function ret_request() 
    {

        if (is_null($this-> user) || !$this->user->can('supplier.view'))
        {
            abort(403, 'Unauthrorized Access');
        }
        if (is_null($this-> user) || !$this->user->can('manufacturer.view'))
        {
            abort(403, 'Unauthrorized Access');
        }
        if (is_null($this-> user) || !$this->user->can('retailer.view'))
        {
            abort(403, 'Unauthrorized Access');
        }


        $cart = Store::all();
        return view('Backend.RetailerShow.ret_requestt',compact('cart'));
    }



    
public function retailer_approve($id)
        {


            $cart = Store::find($id);

            $cart->update([

                'approve_status'=> 'Approved',

            ]);

            return redirect()->back()->with("success1","Request Approved Successfully");;


        }


public function retailer_cancel($id)
        {


            $cart = Store::find($id);

            $cart->update([

                'approve_status'=> 'Canceled',

            ]);

            return redirect()->back()->with("success1","Request Cancel Successfully");;

        }

public function my_product()
        {


            if (is_null($this-> user) || !$this->user->can('admin.view'))
            {
                abort(403, 'Unauthrorized Access');
            }
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


                $cart = Store::get();
                return view('Backend.RetailerShow.my_product',compact('cart'));

        }

    
}
