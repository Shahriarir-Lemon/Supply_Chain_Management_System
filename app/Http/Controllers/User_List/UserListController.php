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

        public $user;

        public function __construct()
        {
            $this->middleware(function($request, $next){
            
                $this->user = Auth()->user();
                return $next($request);

            });
        }

        
    public function user_list()
            {
                $users = User::with('roles')->get();

            // return $users;
                $roles = Role::all();
                $permissions = Permission::all();
                return view ('User_List.user_table', compact('roles','users','permissions'));
            }

   public function user_form()
        {

            if (is_null($this-> user) || !$this->user->can('supplier.view'))
            {
                abort(403, 'Unauthrorized Access');
            }

            if (is_null($this-> user) || !$this->user->can('manufacturer.view'))
                {
                        abort(403, 'Unauthrorized Access');
    
                }
            if (is_null($this-> user) || !$this->user->can('distributor.view'))
                {
                  abort(403, 'Unauthrorized Access');
            
                 }
            if (is_null($this-> user) || !$this->user->can('retailer.view'))
                 {
                         abort(403, 'Unauthrorized Access');
         
                 }


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
                include('SweetAlert.flash');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = [
                'user_name' => $request->input('user_name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'Adress' => $request->input('address'),
                'City' => $request->input('city'),
                'Role'=>$request->input('roles'),
            ];

            $user = User::create($data);

            $user->assignRole($request->roles);

            return redirect()->route('user_list')->with('success1', 'User created successfully');
           }

     public function user_edit($id , Request $request)
            {
                $user = User::find($id);


                $validator = Validator::make($request->all(), [
                    'user_name' => 'required|required|max:20',
                    'email' => 'required|email|unique:users,email,' .$id,
                    'password' => 'nullable|confirmed',
                ]);
                  
                if ($validator->fails()) {
                    include('SweetAlert.flash');
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = [
                    'user_name' => $request->input('user_name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'Adress' => $request->input('address'),
                    'City' => $request->input('city'),
                    'Role'=>$request->input('roles'),


                ];

                $user->update($data);

              if($request->roles)
              {
                $user->assignRole($request->roles);
              }
             

                return redirect()->route('user_list')->with('success1', 'User created successfully');

                
            }
        public function user_delete($id)
        {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('user_list')->with('success1', 'User created successfully');
        }
   
}
