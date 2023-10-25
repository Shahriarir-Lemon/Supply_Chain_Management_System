<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Registration\Exception;

use Alert;
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

        return view('Authenticate.register');
    }

    public function register1(Request $request)
    {
        $this->validate($request, [
            'name' => 'alpha:ascii|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',

        ]);


        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),

        ];

        try {
            User::create($data);
            Alert::success('Congrats', 'Account Created Successfully');

            return redirect()->route('getlogin')->with('success', 'Account Created Successfully');
        } catch (GlobatException $e) {

            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back();
        }
    }
}
