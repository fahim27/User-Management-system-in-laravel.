<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
  public function index()
  {

    $roles = Role::all();


    return view('role.index', \compact('roles', 'permissions'));
  }

  public function create()
  {


    $permissions = Permission::all();
    return view('role.create', \compact('permissions'));
  }

  public function store(Request $request)
  {

    $role = Role::create(['name' => $request->title]);

    if (isset($request->permissions)) {

      foreach ($request->permissions as $permission) {
        $role->givePermissionTo($permission);
      }
    }

    return redirect()->route('role.index')->with('message', 'role Add successfully');
  }

  public function edit($id)
  {
    $role = Role::find($id);
    $permissions = Permission::all();
    return view('role.edit', \compact('permissions', 'role'));
  }


  public function update(Request $request, $id)
  {

    $role = Role::find($id);
     
    $permission=DB::table('role_has_permissions')->where('role_id',$id)->delete();
    

    if (isset($request->permissions)) {

      foreach ($request->permissions as $permission) {
        $role->givePermissionTo($permission);
      }
    }

    return redirect()->route('role.index')->with('message', 'role update successfully');
  }
}
