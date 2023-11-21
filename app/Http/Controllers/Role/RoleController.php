<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
  
    public function role_list()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view ('Role.role_list', compact('roles','permissions'));
    }

   
    public function role_form()
    {
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


            return redirect()->route('role_list');

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

        return redirect()->route('role_list');

    }

   
   

  
    public function role_delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role_list');

    }
}
