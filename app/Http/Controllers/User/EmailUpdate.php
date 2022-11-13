<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailVerification;

class EmailUpdate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.forgot-email');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    

   $user = User::where('email',$request['email'])->first();

    if(!$user){

    $request->session()->flash('error','Email does not exist within the database');

   return redirect(route('user.email_update.create'));

    }
   $role = DB::table('role_user')->where('user_id', $user->id)->first();

   if($role->role_id == 1 || $role->role_id == 2 || $role->role_id == 3){


   if(Hash::check($request['password'], $user->password))
   {
    $check = User::where('email',$request['new_email'])->first();

    if(isset($check)){

   $request->session()->flash('error','Email has already been taken');

   return redirect(route('user.email_update.create'));

    }
       $url = URL::signedRoute('user.email_view',['id' => $user->id, 'email' => $request['new_email']]);
        $verification =[

            'body'=> 'Please click this link to update your email',
            'message'=> 'Verify Email',
            'url'=> $url,
            'thankyou'=> 'Thank you for your cooperation.'

        ];

     Notification::route('mail', $request['new_email'])
    ->notify(new EmailVerification($verification));

      $request->session()->flash('success','Please check your email');

   return redirect(route('user.email_update.create'));


   }
   else{

   $request->session()->flash('error','Credentials do not match any record');

   return redirect(route('user.email_update.create'));

   }
      }
  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
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
