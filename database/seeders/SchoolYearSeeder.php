<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('schoolyear')->insert([

            'year_start' => '2022',
            'year_end' => '2023',
            'enrolment_start' => '2022-01-1 12:03:09',
            'enrolment_end' => '2023-12-31 12:03:09',
            'status' => 'active'
        ]);
     DB::table('schoolyear')->insert([

            'year_start' => '2021',
            'year_end' => '2022',
            'enrolment_start' => '2022-01-1 12:03:09',
            'enrolment_end' => '2023-12-31 12:03:09',
            'status' => 'inactive'
        ]);

          $roles_users = DB::table('role_user')->where('role_id', '3')->get();
          foreach( $roles_users as $role_user ){

           $user = DB::table('users')->where('id', $role_user->user_id)->first();

            DB::table('user_schoolyear')->insert([

             'schoolyear_start' => '2021',
            'schoolyear_end' => '2022',
           'user_id' => $user->id,
           'name' => $user->name,
           'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'middlename' => $user->middlename,
            'lastname' => $user->lastname,
            'extensionname' => $user->extensionname,

          'lastgradelevelcompleted' => $user->lastgradelevelcompleted,
          'strandtoenrolin' => $user->strandtoenrolin,
          'semester'=> $user->semester,
          'studenttype'=> $user->studenttype,
          'indegenouscommunity' => $user->indegenouscommunity,
          'indigency'=> $user->indigency,

          'currentstreet' => $user->currentstreet,
          'currentzipcode' => $user->currentzipcode,
          'currentcountry' => $user->currentcountry,
          'currentbaranggay' => $user->currentbaranggay,
          'currenthousenumber' => $user->currenthousenumber,
          'currentbaranggay' => $user->currentbaranggay,
          'currentmunicipality' => $user->currentmunicipality,
          'currentprovince' => $user->currentprovince,

          'permanentstreet' => $user->permanentstreet,
          'permanentzipcode' => $user->permanentzipcode,
          'permanentcountry' => $user->permanentcountry,
          'permanenthousenumber'=> $user->permanenthousenumber,
          'permanentbaranggay' => $user->permanentbaranggay,
          'permanentmunicipality'=>$user->permanentmunicipality,
          'permanentprovince'=>$user->permanentprovince,

          'phonenumber'=>$user->phonenumber,
          'birthday'=>$user->birthday, 
          'age'=>$user->age,
          'sex' =>$user->sex,
          'mothertongue'=>$user->mothertongue,
         
          'birthplace' =>$user->birthplace,
          'generalaverage' =>$user->generalaverage,
          'lrnnumber' =>$user->lrnnumber,
          'psastatus' =>$user->psastatus,
          'psanumber' =>$user->psanumber,
          'fatherfirstname' =>$user->fatherfirstname,
          'fathermiddlename' =>$user->fathermiddlename,
          'fatherlastname' =>$user->fatherlastname,
          'fatherphonenumber' =>$user->fatherphonenumber,
          'motherfirstname' =>$user->motherfirstname,
          'mothermiddlename' =>$user->mothermiddlename,
          'motherlastname' =>$user->motherlastname,
          'motherphonenumber'=>$user->motherphonenumber,
          'guardianfirstname' =>$user->guardianfirstname,
          'guardianmiddlename'=>$user->guardianmiddlename,
          'guardianlastname' =>$user->guardianlastname,
          'guardianphonenumber'=>$user->guardianphonenumber,
          'gradeleveltoenrolin' =>$user->gradeleveltoenrolin,
          'lastschoolyearattended' =>$user->lastschoolyearattended,
          'lastschoolattended' =>$user->lastschoolattended,
          'schoolid'=>$user->schoolid,
          'birthcertificate' =>  $user->birthcertificate,
          'reportcard' =>  $user->reportcard,
          'semester' => $user->semester,


      
      
             ]);

          }
          $roles_users = DB::table('role_user')->where('role_id', '2')->get();
          foreach( $roles_users as $role_user ){

           $user = DB::table('users')->where('id', $role_user->user_id)->first();

             DB::table('user_schoolyear')->insert([

             'schoolyear_start' => '2021',
            'schoolyear_end' => '2022',
            'user_id' => $user->id,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
           'name' => $user->name,
            'middlename' => $user->middlename,
            'lastname' => $user->lastname,
            'extensionname' => $user->extensionname,

          'lastgradelevelcompleted' => $user->lastgradelevelcompleted,
          'strandtoenrolin' => $user->strandtoenrolin,
          'semester'=> $user->semester,
          'studenttype'=> $user->studenttype,
          'indegenouscommunity' => $user->indegenouscommunity,
          'indigency'=> $user->indigency,

          'currentstreet' => $user->currentstreet,
          'currentzipcode' => $user->currentzipcode,
          'currentcountry' => $user->currentcountry,
          'currentbaranggay' => $user->currentbaranggay,
          'currenthousenumber' => $user->currenthousenumber,
          'currentbaranggay' => $user->currentbaranggay,
          'currentmunicipality' => $user->currentmunicipality,
          'currentprovince' => $user->currentprovince,

          'permanentstreet' => $user->permanentstreet,
          'permanentzipcode' => $user->permanentzipcode,
          'permanentcountry' => $user->permanentcountry,
          'permanenthousenumber'=> $user->permanenthousenumber,
          'permanentbaranggay' => $user->permanentbaranggay,
          'permanentmunicipality'=>$user->permanentmunicipality,
          'permanentprovince'=>$user->permanentprovince,

          'phonenumber'=>$user->phonenumber,
          'birthday'=>$user->birthday, 
          'age'=>$user->age,
          'sex' =>$user->sex,
          'mothertongue'=>$user->mothertongue,
         
          'birthplace' =>$user->birthplace,
          'generalaverage' =>$user->generalaverage,
          'lrnnumber' =>$user->lrnnumber,
          'psastatus' =>$user->psastatus,
          'psanumber' =>$user->psanumber,
          'fatherfirstname' =>$user->fatherfirstname,
          'fathermiddlename' =>$user->fathermiddlename,
          'fatherlastname' =>$user->fatherlastname,
          'fatherphonenumber' =>$user->fatherphonenumber,
          'motherfirstname' =>$user->motherfirstname,
          'mothermiddlename' =>$user->mothermiddlename,
          'motherlastname' =>$user->motherlastname,
          'motherphonenumber'=>$user->motherphonenumber,
          'guardianfirstname' =>$user->guardianfirstname,
          'guardianmiddlename'=>$user->guardianmiddlename,
          'guardianlastname' =>$user->guardianlastname,
          'guardianphonenumber'=>$user->guardianphonenumber,
          'gradeleveltoenrolin' =>$user->gradeleveltoenrolin,
          'lastschoolyearattended' =>$user->lastschoolyearattended,
          'lastschoolattended' =>$user->lastschoolattended,
          'schoolid'=>$user->schoolid,
          'birthcertificate' =>  $user->birthcertificate,
          'reportcard' =>  $user->reportcard,
          'semester' => $user->semester,
      
      
             ]);

          DB::table('user_schoolyear_modality')->insert([

            'modality_id'=> '1',
            'user_id' =>  $user->id

                  ]);
     
     if(($user->gradeleveltoenrolin == 'Grade 11') ||($user->gradeleveltoenrolin == 'Grade 12')){
   $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->first();
    }
    else{
   $section =  DB::table('sections')->where('grade',$user->gradeleveltoenrolin)->where('lower_gwa','<=',$user->generalaverage)->where('upper_gwa','>=',$user->generalaverage)->first();
    } 
    if(isset($section)){
         DB::table('users')->where('id',$user->id)->update([
         'section' => $section->id
          ]); 
    }
    else{
         DB::table('users')->where('id',$user->id)->update([
         'section' => Null
          ]); 
    }
       
          }


          
    }
}
