<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Registration\Exception;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Exceptions\Exception as ExceptionsException;
use Exception as GlobalException;
use FFI\Exception as FFIException;

class RegController extends Controller
{
    public function register()
    {

        return view('Backend.Authenticate.register');
    }

    public function register1(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
           
            'user_name' => 'alpha:ascii|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required||confirmed',

        ]);


        $data = [
            

            'name' => $request->input('user_name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),

        ];

        try {
            User::create($data);
            

            return redirect()->route('getlogin')->with('success1', 'Account Created Successfully');
        } catch (\Exception $e) {

            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back()->withInput();
        }
    }
}
