<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class IssueReportsView extends Controller
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


    return view('admin.issue_reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $student = DB::table('users')->where('lrnnumber',$request['lrnnumber'])->first();

        if(!$student){

           $request->session()->flash('error',"LRN does not match any student in the database");   
            return view('admin.issue_reports.create');

        }

 $extension ='Directed to student : ';

$title = $extension.$request['title'];

             DB::table('issue_reports')->insert([
            'user_id' =>  $student->id,
             'message' =>  $request['specification'],
             'title' => $title,
           'status' =>  'unsolved',
             ]);

   $request->session()->flash('success','You have successfully created a thread');

      return redirect(route('admin.issue_reports.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       $user_id = Auth::id();

     $message = DB::table('issue_reports_reply')->where('issue_reports_id',$id)->orderBy('id', 'desc')->paginate(10);

        $issue = DB::table('issue_reports')->where('id',$id)->first();

        $student = DB::table('users')->where('id',$issue->user_id)->first();
   //dd($message);
           return view('admin.issue_reports.view',['student'=> $student,'issue' => $issue ,'messages' => $message ,'id' => $user_id]);
               }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                  $user_id = Auth::id();

        $message = DB::table('issue_reports_reply')->where('issue_reports_id',$id)->orderBy('id', 'desc')->paginate(10);

        $issue = DB::table('issue_reports')->where('id',$id)->first();
   //dd($message);
           return view('student.report_issue.view',['issue' => $issue ,'messages' => $message ,'id' => $user_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
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
