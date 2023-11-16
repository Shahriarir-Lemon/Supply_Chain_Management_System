<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CustomerRegController extends Controller
{
    public function customer_registration_form()
    {
    return view('Frontend.pages.cus_sign_up');

    }
    
    public function customer_registration(Request $request) 
    {
       // dd($request->all());
        
       
            User::create([
                'role' =>'customer',
                 'name'=>$request->name,
                 'email'=>$request->email,
                 'password' => bcrypt($request->password),
            ]);
        return redirect()->route('customer_login_page');
    }

    public function customer_login_page()
    {
       return view('Frontend.pages.cus_sign_in');
    }

    public function customer_login(Request $request)
        {
           //dd($request->all());
           
           $validated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->password);

            

            if($validated)
            {
                return redirect()->route('home');
            }
            return redirect()->back()->withErrors('Invalid email or password');
        
    
        }
public function customer_logout()
{

    auth()->logout();
   
    return redirect()->route('home');
}


   }

    

