<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Profile extends Controller
{
    public function __invoke(Request $request,$id)
    {
    $id = $request->id;
    $user = User::where('id',$id)->first();

    $role = DB::table('role_user')
                ->where('id', $user->id)->first(); 

         if(!$user){

            $request->session()->flash('error','You can not upload your form');
            return redirect(url('index'));

        }



    $check =  $user->updated;

    if($request['enrollee'] == 'true'){


     
    if($user->gradeleveltoenrolin == 'Grade 7'){

    $gradeleveltoenrolin ='Grade 8';

    } 

    if($user->gradeleveltoenrolin == 'Grade 8'){

    $gradeleveltoenrolin = 'Grade 9';
    
    } 

    if($user->gradeleveltoenrolin == 'Grade 9'){

    $gradeleveltoenrolin = 'Grade 10';
    
    } 


    if($user->gradeleveltoenrolin == 'Grade 10'){

    $gradeleveltoenrolin = 'Grade 11';
    
    } 



    if($user->gradeleveltoenrolin == 'Grade 11'){

    $gradeleveltoenrolin = 'Grade 12';
    
    } 


    if($user->gradeleveltoenrolin == 'Grade 12'){

    $gradeleveltoenrolin = 'Graduate';
    
    } 

    if($role->role_id == '4'){

    $request->session()->flash('success','You have successfully submitted your application form');

    return redirect(url('index'));

    }
    

    $user->studenttype = 'Old Student';

    return view('user.profile',['user' => $user ,'gradeleveltoenrolin' => $gradeleveltoenrolin]);

    }

    if($check == 'No'){
        

    return view('user.profile',['user' => $user]);

    }
//    dd($check);


    $request->session()->flash('success','You have updated your application form');

    return redirect(url('index'));

    }

}
