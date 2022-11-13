<?php

namespace App\Http\Controllers\FacultyLoading;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Sections;
use App\Models\Teachers;
use App\Models\Subjects;
use App\Models\User;
use Carbon;
class SectionController extends Controller
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




    return view('sections.index',['sections'=> Sections::paginate(10)]);

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

        if($request['gradelevel'] == 5 || $request['gradelevel'] == 6){

        if(!isset($request['strand'])){
        $request->session()->flash('error','Please choose a strand to create a section in');
        return redirect(route('faculty.sections.index'));
        }

        }

        $strand = $request['strand'];
        $gradelevel = $request['gradelevel'];

        if(isset($request['strand'])){

      $subjects = Subjects::whereHas('grades', function($query) use ($gradelevel){

      $query->where('grades_id',$gradelevel);

      })->whereHas('strands', function($query) use ($strand){

      $query->where('strands_id',$strand);

      })->get();

        }
    else{

               $subjects = DB::table('grades_subjects')->where('grades_id',$request['gradelevel'])->get();  

    }



    

       $teachers  = DB::table('teachers')->whereNull('advisory')->get(); 


       if($teachers->count() == 0){

        $request->session()->flash('error','There are no available teachers to act as an adviser');
        return redirect(route('faculty.sections.index'));

       }

if($subjects->count() < 1){

        $request->session()->flash('error',"Section cannot be created without a subject assigned to it");
        return redirect(route('faculty.sections.index'));

       }


       if(isset($request['strand'])){
     

         return view('sections.sectionadd',['subjects' => $subjects ,'grade' => $request['gradelevel'], 'strand' => $request['strand'], 'teachers' => $teachers]);
        }

       return view('sections.sectionaddJHS',['subjects' => $subjects ,'grade' => $request['gradelevel'],'teachers' => $teachers]);

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
if($request['lower_gwa'] > $request['upper_gwa']){

  $request->session()->flash('error',"Please set a proper range of GWA");
       return redirect(route('faculty.sections.index'));

}


foreach($request['subject_teachers'] as $index => $teacher) {

if(is_null( $request['starts_at_monday'][$index])){

 $scheduleExists_monday = False;  
}

else{

$scheduleExists_monday = DB::table('subjects_teachers_schedule')
->where('subjects_teachers_id',$request['subject_teachers'][$index])
->where('day', 'Monday')
->where('start','>=', $request['starts_at_monday'][$index])
->where('end','>=', $request['ends_at_monday'][$index])
->exists();

}


if(is_null( $request['starts_at_tuesday'][$index])){

 $scheduleExists_tuesday = False;  
}

else{

$scheduleExists_tuesday = DB::table('subjects_teachers_schedule')
->where('subjects_teachers_id',$request['subject_teachers'][$index])
->where('day', 'Tuesday')
->where('start','>=', $request['starts_at_tuesday'][$index])
->where('end','>=', $request['ends_at_tuesday'][$index])
->exists();

}

if(is_null( $request['starts_at_wednesday'][$index])){

 $scheduleExists_wednesday = False;  
}

else{
    
 $scheduleExists_wednesday = DB::table('subjects_teachers_schedule')
->where('subjects_teachers_id',$request['subject_teachers'][$index])
->where('day', 'Wednesday')
->where('start','>=', $request['starts_at_wednesday'][$index])
->where('end','>=', $request['ends_at_wednesday'][$index])
->exists();

}

if(is_null( $request['starts_at_thursday'][$index])){

 $scheduleExists_thursday = False;  
}

else{

$scheduleExists_thursday = DB::table('subjects_teachers_schedule')
->where('subjects_teachers_id',$request['subject_teachers'][$index])
->where('day', 'Thursday')
->where('start','>=', $request['starts_at_thursday'][$index])
->where('end','>=', $request['ends_at_thursday'][$index])
->exists();

}

if(is_null( $request['starts_at_friday'][$index])){

 $scheduleExists_friday = False;  
}

else{

$scheduleExists_friday = DB::table('subjects_teachers_schedule')
->where('subjects_teachers_id',$request['subject_teachers'][$index])
->where('day', 'Friday')
->where('start','>=', $request['starts_at_friday'][$index])
->where('end','>=', $request['ends_at_friday'][$index])
->exists();

}


if ($scheduleExists_monday || $scheduleExists_tuesday || $scheduleExists_wednesday || $scheduleExists_thursday || $scheduleExists_friday)
{
    
   
     $request->session()->flash('error',"There's a conflict with the schedule you have chosen");
       return redirect(route('faculty.sections.index'));

}


}



   $section = Sections::create([

        'section_number' => $request['section_number'],
        'upper_gwa' => $request['upper_gwa'],
        'lower_gwa' => $request['lower_gwa'],
        'admission_limit' => $request['admission_limit'],
        'admission_status' => 'Yes',
        'strand' => $request['strand'],
        'grade' => $request['grade']

    ]);
 
         DB::table('teachers')->where('id', $request['adviser'])->update(['advisory' => $section->id]);
              


foreach($request['subject_teachers'] as $index => $teacher) {

   
if(isset($request['starts_at_monday'][$index])){

       DB::table('subjects_teachers_schedule')->insert([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Monday',
        'start' => $request['starts_at_monday'][$index],
        'end' => $request['ends_at_monday'][$index]
         ]); 
    
}

if(isset($request['starts_at_tuesday'][$index])){
    
       DB::table('subjects_teachers_schedule')->insert([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Tuesday',
        'start' => $request['starts_at_tuesday'][$index],
        'end' => $request['ends_at_tuesday'][$index]
         ]); 
    
}

if(isset($request['starts_at_wednesday'][$index])){
    
       DB::table('subjects_teachers_schedule')->insert([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Wednesday',
        'start' => $request['starts_at_wednesday'][$index],
        'end' => $request['ends_at_wednesday'][$index]
         ]); 
    
}

if(isset($request['starts_at_thursday'][$index])){
    
       DB::table('subjects_teachers_schedule')->insert([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Thursday',
        'start' => $request['starts_at_thursday'][$index],
        'end' => $request['ends_at_thursday'][$index]
         ]); 
    
}

if(isset($request['starts_at_friday'][$index])){
    
       DB::table('subjects_teachers_schedule')->insert([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Friday',
        'start' => $request['starts_at_friday'][$index],
        'end' => $request['ends_at_friday'][$index]
         ]); 
    
}




                        }
                      
//dd($section->id);

     $request->session()->flash('success','A new section has been successfully created');
        return redirect(route('faculty.sections.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
     $section = Sections::find($id);

  return view('sections.sectionview',['section' =>  $section],['students' => User::where('section', $id)->paginate(10)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    $section = Sections::find($id);



    $schedules = DB::table('subjects_teachers_schedule')->where('section_id',$id)->get();

    $adviser =   DB::table('teachers')->where('advisory', $id)->first();



       return view('sections.sectionedit',['section' => $section ,'adviser'=> $adviser,'schedules' => $schedules]);
      

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
       // /dd($request->all());
              
if(isset($request['subject_teachers'])){

           $section = Sections::find($id);
           $section->section_number = $request['section_number'];
           $section->admission_limit = $request['admission_limit'];
           $section->upper_gwa = $request['upper_gwa'];
           $section->lower_gwa = $request['lower_gwa'];
           $section->save();


 DB::table('teachers')->where('id', $request['originaladviser'])->update(['advisory' => null ]);

 DB::table('teachers')->where('id', $request['adviser'])->update(['advisory' => $id]);
              

foreach($request['subject_teachers'] as $index => $teacher) {

   
if(isset($request['starts_at_monday'][$index])){

       
      DB::table('subjects_teachers_schedule')->where('id', $request['id'][$index])->update([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Monday',
        'start' => $request['starts_at_monday'][$index],
        'end' => $request['ends_at_monday'][$index]
         ]); 
    
}

if(isset($request['starts_at_tuesday'][$index])){
    
       
      DB::table('subjects_teachers_schedule')->where('id', $request['id'][$index])->update([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Tuesday',
        'start' => $request['starts_at_tuesday'][$index],
        'end' => $request['ends_at_tuesday'][$index]
         ]); 
    
}

if(isset($request['starts_at_wednesday'][$index])){
    
       
      DB::table('subjects_teachers_schedule')->where('id', $request['id'][$index])->update([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Wednesday',
        'start' => $request['starts_at_wednesday'][$index],
        'end' => $request['ends_at_wednesday'][$index]
         ]); 
    
}

if(isset($request['starts_at_thursday'][$index])){
    
       
      DB::table('subjects_teachers_schedule')->where('id', $request['id'][$index])->update([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Thursday',
        'start' => $request['starts_at_thursday'][$index],
        'end' => $request['ends_at_thursday'][$index]
         ]); 
    
}

if(isset($request['starts_at_friday'][$index])){
    
      
      DB::table('subjects_teachers_schedule')->where('id', $request['id'][$index])->update([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => 'Friday',
        'start' => $request['starts_at_friday'][$index],
        'end' => $request['ends_at_friday'][$index]
         ]); 
    
}




                        }
                      
//dd($section->id);

     $request->session()->flash('success','Section has been successfully edited');
        return redirect(route('faculty.sections.index'));
//dd($section->id);
   
}
else{

     $request->session()->flash('error','Cannot edit section');
        return redirect(route('faculty.sections.index'));
   

}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Sections::where('id',$id)->delete();

        DB::table('users')->where('section',$id)->update([
        'section' => Null
         ]); 
    
        DB::table('teachers')->where('advisory',$id)->update([
        'advisory' => Null
         ]); 
    

       $request->session()->flash('success','Section have been removed from the database');

        return redirect(route('faculty.sections.index'));
    }

}