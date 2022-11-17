<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Notifications\UpdateForm;
use App\Notifications\EnrollmentFormAcceptance;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreTeacherRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Collection;
use App\Notifications\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(Gate::denies('logged-in')){

            dd('no access allowed');
          }
          if(Gate::allows('is-admin')){

    return view('admin.users.index',['users'=> User::whereHas('roles', function($query) {
      $query->whereNull('updated')->where('name', 'pending');

      })->orderBy('id')->paginate(10)]);

          }

          dd('you need to be an admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          return view('admin.users.create',['roles'=>Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               $this->validate($request, [

            'email'=> 'required|max:255|unique:users',
            'name' => 'required|alpha_spaces|max:255',
            'middlename' => 'sometimes|nullable|alpha_spaces|max:255',
            'lastname' => 'required|max:255|alpha_spaces',
            'phonenumber' => 'required|digits:11|starts_with:63|unique:users',

        ]);

        $user = User::create($request->only([
            
            'name',
            'middlename',
            'lastname',
            'phonenumber',
            'email',
            'password'   

        ]));
     
        $user->email_verified_at = Carbon::now();
        $user->save();


        $user->roles()->attach(1);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success','Succesfully created an admin account');

       return redirect(route('admin.management.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
       return view('admin.users.show',
        [
           
            'user' =>User::find($id),
            'modalities' =>DB::table('modality_user')->where('user_id',$id)->get(),
            'rejection_messages' =>DB::table('rejection_messages')->where('user_id',$id)->orderBy('id','DESC')->get(),
            'records' => DB::table('user_schoolyear')->where('lrnnumber',$user->lrnnumber)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    $user = User::find($id);

    if($user->studenttype == 'Old Student'){

     if($user->gradeleveltoenrolin == 'Grade 12'){

        $gradeleveltoenrolin = 'Grade 11';

    }

    if($user->gradeleveltoenrolin == 'Grade 11'){

        $gradeleveltoenrolin = 'Grade 10';

    }

    if($user->gradeleveltoenrolin == 'Grade 10'){

        $gradeleveltoenrolin = 'Grade 9';

    }

    if($user->gradeleveltoenrolin == 'Grade 9'){

        $gradeleveltoenrolin = 'Grade 8';

    }

    if($user->gradeleveltoenrolin == 'Grade 8'){

        $gradeleveltoenrolin = 'Grade 7';

    }

    if($user->gradeleveltoenrolin == 'Grade 7'){

        $gradeleveltoenrolin = 'Grade 6';

    }

    }
    else{

        $gradeleveltoenrolin = $user->lastgradelevelcompleted;

    }

   

if(($gradeleveltoenrolin == 'Grade 11') || ($gradeleveltoenrolin == 'Grade 12') ){

     $section =  DB::table('sections')->where('grade',$gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<',$user->generalaverage)->where('upper_gwa','>',$user->generalaverage)->first();

    }

  else{

 $section =  DB::table('sections')->where('grade',$gradeleveltoenrolin)->where('lower_gwa','<',$user->generalaverage)->where('upper_gwa','>',$user->generalaverage)->first();

  }  

if(isset($section)) {
   $subject = DB::table('subjects_teachers_schedule')->where('section_id', $section->id)->get();
  $adviser =  DB::table('teachers')->where('advisory', $section->id)->first();   

      return view('admin.users.edit',
        [
            'roles'=>Role::all(),
            'user' => $user,
            'section' => $section,
            'subjects' => $subject,
            'adviser' => $adviser,

        ]);
}

else{
      return view('admin.users.edit',
        [
            'roles'=>Role::all(),
            'user' => $user,
            'warning' => 'warning',
        ]);

}
//dd($section);

  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//accept student
//dd($request->all());

 $user = User::find($id);

if($user->lastgradelevelcompleted == 'Grade 8' || $user->lastgradelevelcompleted == 'Grade 9' || $user->lastgradelevelcompleted == 'Grade 10' || $user->lastgradelevelcompleted == 'Grade 11' || $user->lastgradelevelcompleted == 'Grade 12'){

    if($request['accepted_as'] == 'Conditionally Promoted'){

    if(isset($request['subjects'])){

        foreach($request['subjects'] as $index => $subject) {

      DB::table('conditionally_promoted_subjects')->insert([
     
        'subjects_teachers_schedule_id' => $request['subjects'][$index],
        'user_id' => $user->id,
      
         ]); 
      }

    }

    else
    {

$request->session()->flash('error','Please choose a subject for the student to take for his/her conditional promotion');

        return redirect(route('admin.users.index'));

    }



}

} 




        $user->accepted_as = $request['accepted_as'];
        $user->save();

if(($user->gradeleveltoenrolin == 'Grade 11') ||($user->gradeleveltoenrolin == 'Grade 12')){

  $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->first();

}
else{

   $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->first();

}


$admission_count = $section->admission_count + 1;

if($admission_count >= $section->admission_limit)
{
    $admission_status = 'No';
}
else{

 $admission_status = 'Yes';

}

DB::table('sections')->where('id',$section->id)->update([

'admission_count' => $admission_count,
'admission_status' => $admission_status,

]);

DB::table('users')->where('id',$user->id)->update([

            'last_reviewed_by' => Auth::id()

        ]);

 
        if(!$user){

            $request->session()->flash('error',"You can not accept this the student's enrolment application");
            return redirect(route('admin.users.index'));

        }

        $url = URL::signedRoute('student.resetview' , ['email'=> $user->email]);
        $surveydata =[

            'body'=> 'Congratulations! Your application have been accepted.',
            'message'=> 'Please click the link to set a password for your account',
            'url'=> $url,
            'thankyou'=> 'This link expires in 3 days.'

        ];

        
        Notification::send($user, new EnrollmentFormAcceptance($surveydata));

        

        $user->roles()->sync(2); 
        



        $request->session()->flash('success','The user has been sent an account activation request');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
//decline student
    //dd($id);
        $user = User::findOrFail($id);

   

        $user->updated = 'No';
        $user->save();

     /*   $appeal = DB::table('appeals')->where('user_id',$id)->first();

        if(isset($appeal)){

                DB::table('appeals')->where('user_id',$id)->update([
                    'status' => 'Accepted'
                ]);
        }*/



            $error = array();

            if (isset($request['reason1'])) {

                $reason1_status = 'True';
               $reason1 = $request->input('reason1');
              $error = array_add($error, 'reason1', $reason1);

               }
            else{

                $reason1_status = 'False';

            }
//dd($reason1_status);
           if (isset($request['reason2'])) {
                
              $reason2_status = 'True';
               $reason2= $request->input('reason2');
              $error = array_add($error, 'reason2', $reason2);    
               }
            else{

                $reason2_status = 'False';

            }

             if (isset($request['reason3'])) {

                $reason3_status = 'True';
               $reason3= $request->input('reason3');
              $error = array_add($error, 'reason3', $reason3);
               }

            else{

                $reason3_status = 'False';

               }

           if (isset($request['reason4'])) {

               $reason4_status = 'True';
               $reason4= $request->input('reason4');
              $error = array_add($error, 'reason4', $reason4);    
               }
               else{
                
            $reason4_status = 'False';

               }
                if (isset($request['reason5'])) {
             
             $reason5_status = 'True';
               $reason5= $request->input('reason5');
              $error = array_add($error, 'reason5', $reason5);
               }
            else{

            $reason5_status = 'False';

                }
           if (isset($request['reason6'])) {

             $reason6_status = 'True';
               $reason6= $request->input('reason6');
              $error = array_add($error, 'reason6', $reason6);    
               }

            else{

               $reason6_status = 'False';

                }
                if (isset($request['reason7'])) {

                $reason7_status = 'True';
               $reason7= $request->input('reason7');
              $error = array_add($error, 'reason7', $reason7);    
               }
               else{
                 $reason7_status = 'False';
               }

               $specification= $request->input('specification');

               $error = implode(',', $error);

        if (  (empty($error))    &&    (empty($specification))  ) {
             $request->session()->flash('error',"Please choose at least one reason for the application's rejection or specify the reason in the message box");
         return redirect(route('admin.reason',['id' => $id]));
         }


         if(!$user){

            $request->session()->flash('error','You can not delete this the user');
            return redirect(route('admin.users.index'));

        }

if(($user->gradeleveltoenrolin == 'Grade 11') ||($user->gradeleveltoenrolin == 'Grade 12')){

  $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->first();

}
else{

   $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->first();

}

$role = DB::table('role_user')->where('user_id',$id)->first();

if($role->role_id == 2){

    if(isset($section)){


$admission_count = $section->admission_count - 1;

if($admission_count >= $section->admission_limit)
{
    $admission_status = 'No';
}
else{

 $admission_status = 'Yes';

}

DB::table('sections')->where('id',$section->id)->update([

'admission_count' => $admission_count,
'admission_status' => $admission_status,

]);

 }

}

DB::table('users')->where('id',$user->id)->update([

            'last_reviewed_by' => Auth::id()

        ]);

        $user->roles()->sync(5); 

       
      $url = URL::signedRoute('user.profile' , ['id'=> $id]);  

            $updatedata =[

            'body'=> 'Your enrolment application  has been denied. Below are the reasons for its rejection:',
             'specification'=> $specification,
            'error'=> $error,
            'message'=> "You have been permitted to update your form.Please click this link to view the form.Please contact us for any questions regaring your application's rejection",
            'url'=> $url,
          'thankyou'=> 'Thank you for your patience'

        ];


      if(!isset($request['attach'])){


          $url =  URL::signedRoute('user.appeals', ['id'=> $id]);

         $updatedata =[

            'body'=> 'Your enrolment application  has been denied. Below are the reasons for its rejection:',
             'specification'=> $specification,
            'error'=> $error,
            'message'=> "You have not been permitted to update your form. You may appeal through the link attached to this email.",
            'url'=> $url,
          'thankyou'=> 'Thank you for your patience'

        ];


     }
  



        Notification::send($user, new UpdateForm($updatedata));


              DB::table('rejection_messages')->insert([

             'user_id' => $id,
             'reason_1' => $reason1_status,
             'reason_2' => $reason2_status,
             'reason_3' => $reason3_status,
             'reason_4' => $reason4_status,
             'reason_5' => $reason5_status,
             'reason_6' => $reason6_status,
             'reason_7' => $reason7_status,
             'specification' => $specification,
             'created_at' => Carbon::now()
      
             ]);

        $request->session()->flash('success',"A request to update the student's enrolment form has been sent");
        return redirect(route('admin.users.index'));

    }

}
