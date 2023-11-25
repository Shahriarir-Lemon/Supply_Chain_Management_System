<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class CustomerRegController extends Controller
{

     protected $redirectTo = RouteServiceProvider::HOME;


    public function customer_registration_form()

    {
    return view('Frontend.pages.cus_sign_up');

    }
    
    public function customer_registration(Request $request) 
    {
       // dd($request->all());
        
       $this->validate($request, [
             
        'c_picture' => 'required|image',
        'c_fullname' => 'required|min:6|string',
        'c_username' => 'required|string|min:4',
        'c_email' => 'required|email|unique:customers,c_email',
        'password' => 'required|confirmed|min:6',
        'c_address' => 'required|string',
        'c_city' => 'required|string|',
        'c_zip' => 'integer|required',
        'c_occupation' => 'string|required',

      ]);

     //  if ($val->fails()) {
        // Get the validation errors as a string
      //  session()->flash('message', $e->getMessage());
      //  session()->flash('type', 'danger');

       // return redirect()->back()->withInput();
   // }



       $photo = time().$request->file('c_picture')->getClientOriginalName();
       $path = $request-> file('c_picture')->storeAs('customer_images', $photo, 'public'); 


        $data = [
                
            'c_picture' => '/storage/'.$path,
            'c_fullname' => $request->input('c_fullname'),
            'c_username' => $request->input('c_username'),
            'c_email' => $request->input('c_email'),
            'password' => bcrypt($request->input('password')),
            'c_address' => $request->input('c_address'),
            'c_city' => $request->input('c_city'),
            'c_zip' => $request->input('c_zip'),
            'c_occupation' => $request->input('c_occupation'),

        ];
            try{


            Customer::create($data);

                    
            return redirect()->route('customer_login_page')->with('success', 'Account Created Successfully.');
            }

            catch (\Exception $e)
            {
                session()->flash('message', $e->getMessage());
                session()->flash('type', 'danger');
        
                return redirect()->back()->withInput();   
            }



    }



    public function customer_login_page()
                {
                return view('Frontend.pages.cus_sign_in');
                }




    public function customer_login(Request $request)
        {
           //dd($request->all());


           $credentials = Auth::guard('customer')->attempt([
            'c_email' => $request->c_email,
            'password' => $request->password,
        ], $request->password);
           
           

            

        if ($credentials) 
        {
            // Authentication successful
            return redirect()->route('home')->with('success', 'Logged in Successfully.');
        }
        return redirect()->back()->with('error', 'Email orfdfzc Password invalid !!');
        
    
        }



       public function customer_logout()
                {

                    Auth::guard('customer')->logout();
                
                    return redirect()->route('home');
                }


     public function customer_profile_edit()
                {

                   return view('Frontend.pages.customer_profile_edit');
                }

   }


