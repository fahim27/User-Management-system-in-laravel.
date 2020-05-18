<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
  public function index()
  {

    $users = User::all();
    $roles = Role::all();

    return view('user.index', \compact('users', 'roles'));
  }
  public function create()
  {
    $roles = Role::all();
    return view('user.create', \compact('roles'));
  }


  public function store(Request $request)
  {

    //return $request->all();
    User::insert([
      'name' => $request->name,

      'email' => $request->email,
      'password' => Hash::make($request->password)


    ]);

    return redirect()->route('user.index')->with('message', 'Post Add successfully');
  }

  public function edit($id)
  {

    $user = User::find($id);
    //return $user;
    $roles = Role::all();
    return view('user.edit', \compact('user', 'roles'));
  }

  public function update(Request $request, $id)
  {

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    $roles=DB::table('model_has_roles')->where('model_id',$id)->delete();

    if (isset($request->role)) {

      foreach ($request->role as $role) {

        $user->assignRole($role);
      }
    }
    return redirect()->route('user.index')->with('message', 'user  update successfully');
  }
}
