<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\CusOderDetail;
use App\Models\CusOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\delete;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerified;
use App\Models\Delivery1;
use App\Models\Email;
use Illuminate\Support\Carbon as SupportCarbon;

class CustomerRegController extends Controller implements ShouldQueue
{


        public $user;

        public function __construct()
        {
            $this->middleware(function($request, $next){
            
                $this->user = Auth()->user();
                return $next($request);

            });
        }

        

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
        'c_city' => 'nullable|string|',
        'c_zip' => 'integer|nullable',
        'c_occupation' => 'string|nullable',

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
            'code'=>Str::random(6),
            'otp_expires_at' => Carbon::now()->addMinutes(2),

        ];
            try{


           $user= Customer::create($data);
            
           Mail::to($user->c_email)->send(new EmailVerified($user));
                    
            return redirect()->route('cus_otp')->with('success1', 'Succcessfully Sent OTP, Please Check Your Email.');
            }

            catch (\Exception $e)
            {
                include('SweetAlert.flash');
                return redirect()->back()->withInput();   
            }



    }

    public function cus_otp()
    {
    return view('Email.otp_form')->with('success1', 'Account Created successfully, Now Verify your Account');;
    }



    public function post_otp(Request $request)
    {

        $customer = Customer::latest()->first();

        if ($customer->code == $request->otp && now()->lt($customer->otp_expires_at)) 
           {

            $customer->update([

                'email_verified' => 1,
            ]);

            return view('Frontend.pages.cus_sign_in')->with('success1', 'Account Verified successfully');;
        }

        include('SweetAlert.flash');
        return redirect()->back();

    }



    public function resend()
    {
        $customer = Customer::latest()->first();

        $customer->update([

            'code' => Str::random(6),
            'otp_expires_at' => Carbon::now()->addMinutes(2),
        ]);

        $user = Customer::latest()->first();

        Mail::to($user->c_email)->send(new EmailVerified($user));

        return redirect()->back()->with('success1', 'OTP has been Resent Successfully.');


    }

    public function forgetpassword()
    {

    return view('Email.forgetpassword');
    }


    public function take_email(Request $request)
    {
      //  dd($request);

        $this->validate($request, [
             
            'email' => 'required|email',
        
          ]);

          $data = [
            'email' => $request->input('email'),
            ];

            $value= Email::create($data);

            $lastemail = Email::latest()->first();

            $user = Customer::where('c_email', $lastemail->email)->first();

        if ($user)
         {
            $user->update([

                'code' => Str::random(6),
                'otp_expires_at' => Carbon::now()->addMinutes(2),
            ]);

            $user = Customer::where('c_email', $lastemail->email)->first();

            Mail::to($user->c_email)->send(new EmailVerified($user));

            return view('Email.forget_otp')->with("success1", "Code Send Successfully");

        }
         else 
        {
            include('SweetAlert.flash');
            return redirect()->back();
        }
        
      }


    public function forget_otp(Request $request)
    {

            $lastemail = Email::latest()->first();

            $user = Customer::where('c_email', $lastemail->email)->first();
           

            if ($user->code == $request->otp && now()->lt($user->otp_expires_at)) 

                {
                    return view('Email.resetpass')->with('success1',"Otp Send Successfullt");
            
                }

                include('SweetAlert.flash');
            return redirect()->back();

         }

    public function reset_password(Request $request)
    {
       // echo "hello";
        // dd($request);
        $lastemail = Email::latest()->first();

        $user = Customer::where('c_email', $lastemail->email)->first();
        
        $this->validate($request, [
             
            'password' => 'required|confirmed|min:6',
            
          ]);
      
        if (Hash::check($request->input('password'), $user->password))
           {
            include('SweetAlert.flash');
            
            return redirect()->back();
            }
          try
          {
                $user->update([
                'password' => bcrypt($request->input('password')),
                ]);
                
                return redirect()->route('customer_login_page')->with('success1', 'Password Reset Successfully.');

           }

          
           catch (\Exception $e)
           {
            include('SweetAlert.flash');
       
               return redirect()->back()->withInput();   
           }
       

    }

    public function forget_resend()
    {
        $lastemail = Email::latest()->first();

        $user = Customer::where('c_email', $lastemail->email)->first();

        $user->update([

            'code' => Str::random(6),
            'otp_expires_at' => Carbon::now()->addMinutes(2),
        ]);

        $user = Customer::where('c_email', $lastemail->email)->first();

        Mail::to($user->c_email)->send(new EmailVerified($user));
        //dd($user);

        return redirect()->back()->with('success1', 'OTP has been Resent Successfully.');


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
            return redirect()->route('home')->with('success1', 'Logged in Successfully.');
        }
        
        return redirect()->back();
        
    
        }



       public function customer_logout()
                {

                    Auth::guard('customer')->logout();
                
                    return redirect()->route('home')->with('success1',"Log out successfully");
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
                        include('SweetAlert.flash');
                        return redirect()->back()->withInput();

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
                    return redirect()->back()->with('success1', 'Profile Updated Successfully.');
                }

                catch (\Exception $e)
                 {
                    include('SweetAlert.flash');

                    return redirect()->route('home');
                }


            }


        public function profile_view()
            {

                $orders = CusOrder::where('customer_id', auth()->guard('customer')->user()->id)->get();
                $count = CusOrder::where('customer_id', auth()->guard('customer')->user()->id)->count();
                $pending = CusOrder::where('customer_id', auth()->guard('customer')->user()->id)->where('delevery_status', 'Pending')->count();
                $complete = CusOrder::where('customer_id', auth()->guard('customer')->user()->id)->where('delevery_status', 'Done')->count();



                
        $name =CusOrder::all();
                $mans = [];

                foreach ($name as $m) 
                {
                    $man = Delivery1::where('id', $m->id)->first();
                
                    if ($man)
                     {
                        $mans[] = $man;
                    }
                }
             



                return view('Frontend.pages.profile_view',compact('orders','mans','count','pending','complete'));
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


