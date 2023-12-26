<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
  
    public $user;

        public function __construct()
        {
            $this->middleware(function($request, $next){
            
                $this->user = Auth()->user();
                return $next($request);

            });
        }



    public function role_list()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view ('Role.role_table', compact('roles','permissions'));
    }

   
    public function role_form()
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

        $permissions = Permission::all();
        return view ('Role.role_form', compact('permissions'));
    }

   
    public function role_create(Request $request)
    {


        // 'email' => 'unique:users,email',

            $request->validate([
                'name' => 'required|unique:roles,name'],
                [
                    'name.required'=> 'Please give a role name'
                
                ]);

            $role = Role::create(['name' => $request->name]);

            $permissions = $request->input('permission');


            if (!empty($permissions))
                {
                    $role->syncPermissions($permissions);
                }


            return redirect()->route('role_list')->with("success1","New Role Added Successfully");;

    }

  
   
   
    public function role_edit(Request $request, $id)
       {
        

        $role = Role::find($id);

        $request->validate([
            'name' => 'required|string|max:20|unique:roles,name,' . $id,
            'permissions' => 'array',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $permissions = $request->input('permissions') ?? [];
        $role->syncPermissions($permissions);

        return redirect()->route('role_list')->with("success1","Role Edited Successfully");;

         }

   
   

  
    public function role_delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role_list')->with("success1","Role Deleted Successfully");;

     }
}



