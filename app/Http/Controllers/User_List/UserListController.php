<?php

namespace App\Http\Controllers\User_List;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserListController extends Controller
{
    public function user_list()
    {
        $users = User::with('roles')->latest()->get();

       // return $users;
        $roles = Role::all();
        $permissions = Permission::all();
        return view ('User_List.user_list', compact('roles','users','permissions'));
    }

   public function user_form()
   {
    $roles = Role::all();
    return view ('User_List.user_form', compact('roles'));
    }


    public function user_create(Request $request)


   {
    $validator = Validator::make($request->all(), [
        'user_name' => 'required|max:20',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
        'roles' => 'required', 
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $data = [
        'user_name' => $request->input('user_name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'Adress' => $request->input('address'),
        'City' => $request->input('city'),
    ];

    $user = User::create($data);

    $user->assignRole($request->roles);

    return redirect()->route('user_list')->with('success', 'User created successfully');
}

   

   
}
