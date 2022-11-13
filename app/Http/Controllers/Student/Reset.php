<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Models\SchoolYear;

class Reset extends Controller
{
    public function __invoke(Request $request)
    {
$request->validate([
    'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
]);
//dd('fail'); 

  $schoolyear = SchoolYear::where('status','active')->orWhere('status','paused')->first();




      $email = $request['email'];
      $user = User::where('email',$email)->first();

if(($user->gradeleveltoenrolin == 'Grade 11') ||($user->gradeleveltoenrolin == 'Grade 12')){
  $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->where('admission_status','Yes')->first();
}
else{

$section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->where('admission_status','Yes')->first();
}


// /dd($section);
if (isset($section)) {
         $user->section = $section->id;
        $user->save();


      if( $request['password'] == $request['password_confirmation'])
      {

        $user->forceFill([
            'password' => Hash::make($request['password']),
        ])->save();

       $request->session()->flash('success','Note: You will be officially enrolled once you submit your physical enrolment form and requirements to BNHS');
       return view('auth/login');
     }
       $request->session()->flash('error','Passwords do not match');
       return redirect(URL::signedRoute('student.resetview',['email' => $email]));
}
else{
   $request->session()->flash('error','Something went wrong please contact the administrator');
       return redirect(URL::signedRoute('student.resetview',['email' => $email]));
}
  



 }
}
