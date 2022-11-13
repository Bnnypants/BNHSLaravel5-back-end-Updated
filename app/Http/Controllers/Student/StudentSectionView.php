<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentSectionView extends Controller
{
       public function __invoke(Request $request)
       {

    $id = Auth::id(); 
    $user = User::find($id);



    $section = DB::table('sections')->where('id',$user->section)->first();

if (isset($section)) {

      $adviser = DB::table('teachers')->where('advisory',$section->id)->first();

    $subjects = DB::table('subjects_teachers_schedule')->where('section_id',$section->id)->get();
}

    

    if($user->accepted_as == 'Conditionally Promoted')

       {
 $back_subject_data = DB::table('conditionally_promoted_subjects')->where('user_id',$user->id)->get();

 $data = DB::table('conditionally_promoted_subjects')->where('user_id',$user->id)->first();

if(isset($data)){

   $back = DB::table('subjects_teachers_schedule')->where('id',$data->subjects_teachers_schedule_id)->first();

$back_section = DB::table('sections')->where('id',$back->section_id)->first();

   return view('student.studentsection',[ 'adviser' => $adviser,'student' => $user, 'section' => $section , 'subjects' => $subjects,
    'back_subject_datas' => $back_subject_data,
    'back_section' => $back_section

  ]);
   if (isset($section)) {
      return view('student.studentsection',[ 'adviser' => $adviser,'student' => $user, 'section' => $section , 'subjects' => $subjects,
    'back_subject_datas' => $back_subject_data,
    'back_section' => $back_section

  ]);
}
else {
      return view('student.studentsection',[ 'student' => $user, 'subjects' => $subjects,
    'back_subject_datas' => $back_subject_data,
    'back_section' => $back_section

  ]);
}

}





       } 

if (isset($section)) {
      return view('student.studentsection',[ 'adviser' => $adviser,'student' => $user, 'section' => $section , 'subjects' => $subjects]);

       }

else {
      return view('student.studentsection',[ 'student' => $user ]);

       }
}
}