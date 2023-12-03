<?php

namespace App\Http\Controllers\UserCart;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Material;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
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
                
                return redirect()->back()->with('success', 'Product Updated Successfully.');

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

                

              


                return redirect()->back()->with('success', 'Product Added Successfully.');
            }
        
    
            
        }

        public function cart_show()
        {

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
            return redirect()->back();

           

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
                    return redirect()->back();
                } 

                else 
                {
                    
                    return redirect()->back();
                }

        }
        
}
