<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IssueReports extends Controller
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

    return view('admin.issue_reports.index',['issues'=> DB::table('issue_reports')->where('status','unsolved')->paginate(10),'id'=>Auth::id()]);

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
    
        if(Gate::denies('logged-in')){

            dd('no access allowed');
          }
          if(Gate::allows('is-admin')){

    return view('admin.issue_reports.unsolved',['issues'=> DB::table('issue_reports')->where('status','solved')->paginate(10),'id'=>Auth::id()]);

          }

          dd('you need to be an admin');
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
    public function show(Request $request,$id)
    {
  
   
        $message = DB::table('issue_reports')->where('id',$id)->where('user_id',$request['student_id'])->latest()->first();
   //dd($message);
           return view('admin.issue_reports.reply',['message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
    
        $message = DB::table('issue_reports')->where('id',$id)->first();

        if($message->status == 'solved'){

              DB::table('issue_reports')->where('id',$id)->update([

             'status' =>  'unsolved'
        

             ]);


   $request->session()->flash('success','Issue marked as solved');

      return redirect(route('admin.issue_reports.create'));

      
        }
           else{

              DB::table('issue_reports')->where('id',$id)->update([

             'status' =>  'solved'
    

             ]);
  $request->session()->flash('error','Issue marked as unsolved');

      return redirect(route('admin.issue_reports.index'));
 
            
        }
          
        
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
    
             DB::table('issue_reports_reply')->insert([
            'user_id' =>  Auth::id(),
             'message' =>  $request['specification'],
             'issue_reports_id' =>  $id,
             'created_at' => Carbon::now()
      
             ]);

   $request->session()->flash('success','You have successfully replied');

      return redirect(route('admin.issue_reports.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   $user_id = Auth::id();

        $message = DB::table('issue_reports_reply')->where('issue_reports_id',$id)->orderBy('id', 'desc')->paginate(10);

        $issue = DB::table('issue_reports')->where('id',$id)->first();
   //dd($message);
           return view('admin.issue_reports.view',['issue' => $issue ,'messages' => $message ,'id' => $user_id]);
    }
}
