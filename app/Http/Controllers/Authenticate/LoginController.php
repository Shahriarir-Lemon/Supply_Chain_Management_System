<?php

namespace App\Http\Controllers\Authenticate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    public function adminlogin()
    {

        return view('Authenticate.login');
    }
    public function adminlogin1(Request $request)
    {

        $request->validate(['email' => 'required|email', 'password' => 'required']);

        $validated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->password);

        if ($validated) {
            return redirect()->route('dash')->with('success', 'Succesfully Loged in');
        } else {


            return redirect()->back()->with('error', 'Invalid email or Wrong pasword');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('land');
    }
}
