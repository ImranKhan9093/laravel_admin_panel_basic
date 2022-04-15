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


    public function editRoles(Request $request,User $user){
      
       return view('admin.edit_registered_user',compact('user'));
    }
    public function updateRole(Request $request,User $user){
         
         $userToBeUpdated=User::find($user->id);
         $userToBeUpdated->usertype=$request->usertype;
        $userToBeUpdated->update();
           
         return redirect()->route('admin.registeredRoles')->with('success','Role updated successfully');
    }
}
