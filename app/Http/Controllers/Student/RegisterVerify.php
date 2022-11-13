<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use App\Notifications\EmailVerification;
use Illuminate\Support\Facades\Notification;

class RegisterVerify extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('buh');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $schoolyear = SchoolYear::where('status','active')->orWhere('status','paused')->first();


    if($schoolyear->status == 'paused'){

    return view('auth.first_register',['schoolyear'=> $schoolyear, 'status' => 'false']);
        
    }

    if(Carbon::now()->between($schoolyear->enrolment_start,$schoolyear->enrolment_end))
    {

     return view('auth.first_register',['schoolyear'=> $schoolyear, 'status' => 'true']);
    }


    return view('auth.first_register',['schoolyear'=> $schoolyear, 'status' => 'false']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//dd($request->all());
  
    if(isset($request['existing_account']))
    {
   
   $user = User::where('email',$request['email'])->where('lrnnumber',$request['lrnnumber'])->first();

   $role = DB::table('role_user')->where('user_id', $user->id)->first();

   if($role->role_id != 3)
   {

   $schoolyear = SchoolYear::where('status','active')->orWhere('status','paused')->first();

   $request->session()->flash('error','You do not have permission to fill up an enrolment form');

   return view('auth.first_register',['schoolyear'=> $schoolyear, 'status' => 'true']);

   }

   if(Hash::check($request['password'], $user->password))
   {

   return redirect(URL::signedRoute('user.profile' , ['id'=> $user->id, 'enrollee' =>  'true' ]));  

   }
   else
   {

  $schoolyear = SchoolYear::where('status','active')->orWhere('status','paused')->first();

   $request->session()->flash('error','Incorrect password');

   return view('auth.first_register',['schoolyear'=> $schoolyear, 'status' => 'true']); 

   }

    }

else{

//dd($request->all());
        $this->validate($request, [
            'email'=> 'required|max:255|unique:users',
 
           'lrnnumber' => 'required|digits:12|unique:users']);

    $url = URL::signedRoute('user.verifyconfirm' , ['email'=> $request['email'],'lrn'=> $request['lrnnumber']]);
        $verification =[

            'body'=> 'You are almost done! Please verify that this is your email. Once you verify that this is your email, you will be redirected to your enrolment form.',
            'message'=> 'Verify Email',
            'url'=> $url,
            'thankyou'=> 'Thank you for your cooperation.'

        ];

Notification::route('mail', $request['email'])
    ->notify(new EmailVerification($verification));

   $schoolyear = SchoolYear::where('status','active')->orWhere('status','paused')->first();

  $request->session()->flash('success','Check your email for your email verification');

   return view('auth.first_register',['schoolyear'=> $schoolyear, 'status' => 'true']); 
}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
           dd('banana');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
