<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionController extends Controller
{
    public function index(){


    $permission=Permission::find(1);
    $role=Role::find(1);
    $role->givePermissionTo($permission);



    }
}
