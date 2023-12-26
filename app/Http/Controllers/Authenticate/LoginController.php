<?php

namespace App\Http\Controllers\Authenticate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    public function adminlogin()
    {  

        return view('Backend.Authenticate.login');
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
            $credentials = [
                'user_name' => $request->user_name,
                'password' => $request->password,
            ];
            
            $validated = auth()->attempt($credentials);
            
            if ($validated)
             {

                if(auth()->user()->unreadNotifications->count() > 0)
                    {
                        Redirect::to('')->with('success2', 'Hello, You Got New Notifications !!');
                        return redirect()->route('dash')->with('success1', 'Successfully Logged in');
                    }
          
                return redirect()->route('dash')->with('success1', 'Successfully Logged in');
            }

            

            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
            




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
        return redirect()->route('admin_login')->with("success1", "Successfully Logged Out");
    }
}
