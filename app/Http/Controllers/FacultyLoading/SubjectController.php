<?php

namespace App\Http\Controllers\FacultyLoading;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use App\Models\Teachers;
use App\Models\SubjectTeacher;
use App\Models\Subjects;
use App\Models\Sections;
use App\Models\Stands;
use App\Models\Grades;
use App\Models\SubjectTeachersSchedule;

class SubjectController extends Controller
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

$availableteachers = Teachers::where('status','Active')->get();


    return view('subjects.index',['availableteachers' => $availableteachers],['subjects'=> Subjects::paginate(10)]);

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
           dd($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // dd($request->all());
         $subject = Subjects::create($request->only([
            'name'

        ]));


        if (isset($request['gradelevel'])) {

        if(is_null($request['gradelevel'])){
        $request->session()->flash('error','Please assign gradelevels to subject');
        return redirect(route('faculty.subjects.index'));
        }
        $subject->grades()->attach($request['gradelevel']);
        } 
        else{

        $request->session()->flash('error','Please pick a gradelevel');
        return redirect(route('faculty.subjects.index'));

        }

        
        if ((in_array(5,$request['gradelevel'])) || (in_array(6,$request['gradelevel']))  ) {

        if(is_null($request['strands'])){
        $request->session()->flash('error','Please pick a strand');
        return redirect(route('faculty.subjects.index'));
        }

        $subject->strands()->attach($request['strands']);

        } 

        if (isset($request['teachers'])) {

        if(is_null($request['teachers'])){
        $request->session()->flash('error','Please assign teachers to subject');
        return redirect(route('faculty.subjects.index'));
        }

        $subject->teachers()->attach($request['teachers']);
        } 

        $request->session()->flash('success','You have added a new subject');
        return redirect(route('faculty.subjects.index'));
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       
    
    $subject = Subjects::find($id);

  return view('subjects.subjectview',['subject' =>  $subject],['subjects' => SubjectTeacher::where('subjects_id', $id)->paginate(10)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
$subject = Subjects::find($id);

  return view('subjects.subjectedit',['subject' =>  $subject],['subjects' => SubjectTeacher::where('subjects_id', $id)->paginate(10)]);
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
       // dd($request->all());

           $subject = Subjects::find($id);
           $subject->name = $request['name'];
           $subject->save();

        if (isset($request['gradelevel'])) {

        if(is_null($request['gradelevel'])){
        $request->session()->flash('error','Please assign gradelevels to subject');
        return redirect(route('faculty.subjects.index'));
        }
        $subject->grades()->sync($request['gradelevel']);
        } 

        
        if ((in_array(5,$request['gradelevel'])) || (in_array(6,$request['gradelevel']))  ) {

        if(is_null($request['strands'])){
        $request->session()->flash('error','Please pick a strand');
        return redirect(route('faculty.subjects.index'));
        }

        $subject->strands()->sync($request['strands']);

        } 

        else
        {
        $subject->strands()->delete();
        }



        if (isset($request['teachers'])) {

        if(is_null($request['teachers'])){
        $request->session()->flash('error','Please assign teachers to subject');
        return redirect(route('faculty.subjects.edit',['id' => $id]));
        }

        $subject->teachers()->sync($request['teachers']);
        } 

        $request->session()->flash('success',"Subject's data have been successfully edited");

        return redirect(route('faculty.subjects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

       Subjects::where('id',$id)->delete();
       $request->session()->flash('error','Subject have been removed from the database');

        return redirect(route('faculty.subjects.index')); 
        
    }
}
