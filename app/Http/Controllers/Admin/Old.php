<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;

class Old extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
      // dd('banana');
        $user = DB::table('user_schoolyear')->where('id',$request->id)->first();

        $modality =  DB::table('user_schoolyear_modality')->where('user_id',$request->id)->get();
//dd( $modality );

         $data = [
          'name' => $user->name,
          'middlename'=> $user->middlename,
          'lastname'=> $user->lastname,
          'extensionname'=> $user->extensionname,
          'email'=> $user->email,
          'lastgradelevelcompleted'=> $user->lastgradelevelcompleted,
          'strandtoenrolin'=> $user->strandtoenrolin,
          'semester'=> $user->semester,
          'studenttype'=> $user->studenttype,
          'indegenouscommunity'=> $user->indegenouscommunity,
          'indigency'=> $user->indigency,
          'currentzipcode'=> $user->currentzipcode,
          'currentstreet'=> $user->currentstreet,
          'currentcountry'=> $user->currentcountry,
          'currenthousenumber'=> $user->currenthousenumber,
          'currentbaranggay'=> $user->currentbaranggay,
          'currentmunicipality'=> $user->currentmunicipality,
          'currentprovince'=> $user->currentprovince,
          'permanentzipcode'=> $user->permanentzipcode,
          'permanentstreet'=> $user->permanentstreet,
          'permanentcountry'=> $user->permanentcountry,
          'permanenthousenumber'=> $user->permanenthousenumber,
          'permanentbaranggay' => $user->permanenthousenumber,
          'permanentmunicipality'=> $user->permanentmunicipality,
          'permanentprovince'=> $user->permanentprovince, 
          'phonenumber'=> $user->phonenumber, 
          'birthday'=> $user->birthday, 
          'age' => $user->age,
          'sex' => $user->sex,
          'mothertongue'=> $user->mothertongue,
          'generalaverage' => $user->generalaverage,
          'lrnnumber' => $user->lrnnumber,
          'psastatus' => $user->psastatus,
          'psanumber' => $user->psanumber,
          'fatherfirstname' => $user->fatherfirstname,
          'fathermiddlename' => $user->fathermiddlename,
          'fatherlastname' => $user->fatherlastname,
          'fatherphonenumber' => $user->fatherphonenumber,
          'motherfirstname' => $user->motherfirstname,
          'mothermiddlename' => $user->mothermiddlename,
          'motherlastname' => $user->motherlastname,
          'motherphonenumber'=> $user->motherphonenumber,
          'guardianfirstname' => $user->guardianfirstname,
          'guardianmiddlename' => $user->guardianmiddlename,
          'guardianlastname' => $user->guardianlastname,
          'guardianphonenumber'=> $user->guardianphonenumber,
          'gradeleveltoenrolin' => $user->gradeleveltoenrolin,
          'lastschoolyearattended'=> $user->lastschoolyearattended,
          'lastschoolattended'=> $user->lastschoolattended,
          'schoolid'=> $user->schoolid,
          'birthplace'=> $user->birthplace,
          'date'=> date('Y-m-d', strtotime($user->email_verified_at)),
          'modalities'=> $modality
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download( $user->name.' '.$user->lastname.' Enrolment_Form_Data.pdf');
    }
}
