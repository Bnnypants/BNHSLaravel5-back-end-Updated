<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UpdateForm;
use App\Notifications\SurveyForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Password;

class RequestUser extends Controller
{
    public function __invoke(Request $request)
    {

    
     $user = User::where('email',$request['email'])->first();

         if(!$user){

            $request->session()->flash('error','Credentials do not match our records');
            return redirect(route('password.request'));

        }

      $userrole = DB::table('role_user')->where('user_id', $user->id)->first();

      $role = $userrole->role_id;

      



    if($role == '1' || $role == '2' ){

         Password::sendResetLink($request->only(['email']));

    $request->session()->flash('success','You may reset your password thru the email we sent.Please check your email');

    return redirect(route('password.request'));

    }
    else{

          $request->session()->flash('error','You do not have permssion to reset your password');
          return redirect(route('password.request'));
    }


    }

}
