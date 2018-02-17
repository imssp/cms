<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Role;

class AdminController extends Controller
{
    public function assign(Request $request)
    {
        if(isset($request))
            return view('faculty.admin.admin');
        else
        {
            return $request->faculty;
        }
    }

    public function displayFaculty(Request $request)
    {
        $faculty = Staff::where("e_id","=",$request->hidden_eid)->first();
        $roles = Role::where("e_id","=",$request->hidden_eid)->get();
        return view('faculty.admin.admin')->with('faculty',$faculty)->with('roles',$roles);
    }

    // Insert a Role in the database
    public function insertRole(Request $request)
    {
        $role_object = new Role;

        $duplicate_check = Role::where("roles_id","=",$request->hidden_role)->where("e_id","=",$request->hidden_eid_new)->first();
        if(!count($duplicate_check)>0)
        {
            $role_object->roles_id = $request->hidden_role;
            $role_object->e_id = $request->hidden_eid_new;
            $role_object->save();
            return redirect('staff/admin')->with('success','Role Assigned Successfully');
        }
        else
        {
            return redirect('staff/admin')->with('error','Role is already assigned');            
        }
    }

    // Remove a role from the database
    public function removeRole(Request $request)
    {
        //return $request->role." ".$request->eid;
        $role = Role::where("roles_id","=",$request->role)->where("e_id","=",$request->eid)->delete();
        //$role->delete();
        return "The staff has been relieved of the role";
    }
}
