<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function AllPermission(){

        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));

    } // End Method

    public function AddPermission(){

        return view('backend.pages.permission.add_permission');

    }// End Method

    public function StorePermission(Request $request){

        $permission = Permission::create([
            'name'       => $request->name,
            'group_name'  => $request->group_name,
        ]);

        $notification = array(
             'message'       => 'Permission Create Successfully',
            'alert-type'    => 'success'
        );

        return redirect()->route('all.permission')->with($notification);

    }// End Method

    public function EditPermission($id){

        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));

    }// End Method

    public function UpdatePermission(Request $request){

        $perid = $request->id;

        Permission::findOrFail($perid)->update([

            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);

        $notification = array(
            'message'       => 'Permission Updated Successfully',
            'alert-type'    => 'success'
        );

              return redirect()->route('all.permission')->with($notification);

    }// End Method

    public function DeletePermission($id){

        Permission::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Permission Deleted Successfully',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


}
