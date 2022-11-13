<?php

namespace App\Http\Controllers\FacultyLoading;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTeacherRequest;
use App\Models\Teachers;
use App\Models\SubjectTeacher;
use App\Models\Subjects;
use App\Models\Sections;
use App\Models\SubjectTeachersSchedule;
use Carbon\Carbon;

class TeacherController extends Controller
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

    return view('teachers.index',['teachers'=> Teachers::where('status','Active')->paginate(10)]);

          }

          dd('you need to be an admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  
     $teacher = Teachers::find($id);

  return view('teachers.teacherdelete',['teacher' =>  $teacher],['subjects' => SubjectTeacher::where('teachers_id', $id)->paginate(10)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        //dd($request->all());
            $teacher = Teachers::create($request->only([
            'firstname',
            'middlename',
            'lastname',
            'phonenumber',
            'email'

        ]));

           $teacher->status = 'Active';
           $teacher->save();

        $request->session()->flash('success','You have added a new teacher');

        return redirect(route('faculty.teachers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


 $teacher = Teachers::find($id);

  return view('teachers.teacherview',['teacher' =>  $teacher],['subjects' => SubjectTeacher::where('teachers_id', $id)->paginate(10)]);


 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
$teacher = Teachers::find($id);

  return view('teachers.teacheredit',['teacher' =>  $teacher],['subjects' => SubjectTeacher::where('teachers_id', $id)->paginate(10)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
           
           $teacher = Teachers::find($id);
           $teacher->firstname = $request['firstname'];
           $teacher->middlename = $request['middlename'];
           $teacher->lastname = $request['lastname'];
           $teacher->save();

        $request->session()->flash('success',"Teacher's data have been successfully edited");

        return redirect(route('faculty.teachers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

         $teacher = Teachers::find($id);
  //dd($teacher->status);
         if($teacher->status == 'Inactive'){

             $teacher->status = 'Active';
           $teacher->save();

        $request->session()->flash('success','Teacher have been marked as active');

        return redirect(route('faculty.inactive'));

         }

        if($teacher->status == 'Active'){

             $teacher->status = 'Inactive';
           $teacher->save();

        $request->session()->flash('success','Teacher have been marked as inactive');

        return redirect(route('faculty.teachers.index'));
           
         }
         


    }
}
