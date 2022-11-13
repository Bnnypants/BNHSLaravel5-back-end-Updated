<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Reason extends Controller
{
    public function __invoke(Request $request,$id)
    {

     $user = User::where('id',$id)->first();
      

         if(!$user){

            $request->session()->flash('error','You can not upload your form');
            return redirect(route('/'));

        }

    return view('admin.users.reason',['user' => $user]);
    }

}
