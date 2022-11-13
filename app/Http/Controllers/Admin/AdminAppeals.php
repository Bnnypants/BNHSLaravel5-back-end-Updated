<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use App\Notifications\UpdateForm;

class AdminAppeals extends Controller
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

    return view('admin.users.appeals',['appeals'=> DB::table('appeals')->where('status', 'Pending')->paginate(10)]);

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
    
       $user = User::find($id);

       $appeal = DB::table('appeals')->where('user_id', $id)->first();

        return view('admin.users.reject_appeal',['user' => $user, 'appeal' => $appeal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

   DB::table('appeals')->where('id', $request['id'])->update(
    [
        'status' => 'Rejected'
    ]);


    $user = User::findOrFail($id);

       DB::table('role_user')->where('user_id', $user->id)->update(
    [
        'role_id' => '7'
    ]);


          $url =  URL('index');

         $updatedata =[

            'body'=> 'Your appeal has been denied.',
             'specification'=> 'We are sorry but after thorough consideration we have decided to reject your appeal',
            'error'=> 'You may visit us for further explenation',
            'message'=> "Check our website for our contact info",
            'url'=> $url,
          'thankyou'=> 'Thank you for your patience'

        ];


        Notification::send($user, new UpdateForm($updatedata));


        $request->session()->flash('success',"Appeal has been denied");
        return redirect(route('admin.appeals.index'));
    }
}
