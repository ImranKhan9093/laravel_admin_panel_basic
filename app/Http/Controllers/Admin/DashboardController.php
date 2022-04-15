<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registeredRoles(){
        // $user=User::where('usertype','!=','admin')->get();
        $users=User::all();
       return view('admin.registered_roles',compact('users'));
    }
}
