<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\CusOderDetail;
use App\Models\CusOrder;
use Illuminate\Support\Facades\delete;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;



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


     public function customer_profile_edit_page()
                {

                    $customer = Auth('customer')->user();
                    $data['customer'] = $customer;
                   return view('Frontend.pages.customer_profile_edit',$data);
                }

    public function customer_profile_edit(Request $request, $id) 
                 {

                   // dd($request->all());


                    $validate = Validator::make($request->all(), [
             
                        'c_picture' => 'nullable',
                        'c_fullname' => 'required|min:6|string',
                        'c_username' => 'required|string|min:4',
                        'c_about' => 'nullable|string',
                        'c_email' => 'required|email|unique:customers,c_email,' . $id,
                        'c_address' => 'nullable|string',
                        'password2' => 'required|min:4',
                        'password1' => 'required|min:4|different:password',
                        'password1_confirmation' => 'required|same:password1',
                        'c_city' => 'nullable|string|',
                        'c_occupation' => 'nullable',
                
                      ]);

                if ($validate->fails())
                    {
                        return redirect()->back()->withErrors($validate)->withInput();

                    }


                      $customer = Customer::find($id); // Replace User with your actual model class
                      
                    if (!Hash::check($request->input('password2'), $customer->password)) {
                        // Old password does not match, return an error or redirect back with a message
                        return redirect()->route('home');
                    }

                    $data = [];

                    

         if ($request->hasFile('c_picture'))
             {
                
                $photo = time() . $request->file('c_picture')->getClientOriginalName();
                
                
                $path = $request->file('c_picture')->storeAs('customer_images', $photo, 'public');
            
               
                $data['c_picture'] = '/storage/' . $path;
            }


        
        $data['c_fullname'] = $request->input('c_fullname');
        $data['c_username'] = $request->input('c_username');
        $data['c_about'] = $request->input('c_about');
        $data['c_email'] = $request->input('c_email');
        $data['password'] = Hash::make($request->password1);
        $data['c_address'] = $request->input('c_address');
        $data['c_city'] = $request->input('c_city');
        $data['c_occupation'] = $request->input('c_occupation');




                 try{
                    $customer->update($data);
                    return redirect()->back()->with('success', 'Profile Updated Successfully.');
                }

                catch (\Exception $e)
                 {
                    session()->flash('message', $e->getMessage());
                    session()->flash('type', 'danger');

                    return redirect()->route('home');
                }


            }


            public function profile_view()
            {

                $orders =CusOrder::all();
                return view('Frontend.pages.profile_view',compact('orders'));
            }

            public function cus_download($id)
            {

                $orders =CusOrder::find($id);

                $today = Carbon::now()->format('Y-m-d');

                $details = CusOderDetail::where('cus_order_id',$id)->get();
                
               // return view('Frontend.pages.cus_invoice',compact('orders','today','details'));

                $data = [
                    'orders' => $orders,
                    'today' => $today,
                    'details' =>$details,
                   
                ];

                $pdf = Pdf::loadView('Frontend.pages.cus_invoice', $data);

                return $pdf->download('invoice of-'.$orders->name.'.pdf');

            }

   }


