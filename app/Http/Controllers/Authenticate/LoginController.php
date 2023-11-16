<?php

namespace App\Http\Controllers\Authenticate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    public function adminlogin()
    {

        return view('Backend.Authenticate.adminlogin');
    }
    public function admin_post_login(Request $request)
    {
        

     /*   $val=Validator::make($request->all(),
        [
            'email' => 'required|email', 
            'password' => 'required\min:6'
        ]);

       if($val->fails())
       {
           return redirect()->back();
       }   */

      $validated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->password);

           // $credentials=$request->except('_token');
            // $credentials=$request->only('email','password');

            if($validated)
            {
                return redirect()->route('dash')->with('success', 'Succesfully Loged in');
            }

            return redirect()->back()->with('error', 'Invalid email or Wrong pasword');




        /* $validated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->password);

        if ($validated) {
            return redirect()->route('dash')->with('success', 'Succesfully Loged in');
        } else {


            return redirect()->back()->with('error', 'Invalid email or Wrong pasword');
        }  */


    }

    public function adminlogout()
    {
        auth()->logout();
        return redirect()->route('admin_login');
    }
}
