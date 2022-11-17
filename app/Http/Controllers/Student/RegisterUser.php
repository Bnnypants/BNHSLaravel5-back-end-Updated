<?php

namespace App\Http\Controllers\Student;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use App\Notifications\EmailVerification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreEnrolleeApplication;
use Carbon\Carbon;

class RegisterUser extends Controller
{
     public function __invoke(Request $request)
    {
//dd($request->all());

          $this->validate($request, [

            'email'=> 'required|max:255|unique:users',
            'name' => 'required|alpha_spaces|max:255',
            'middlename' => 'sometimes|nullable|alpha_spaces|max:255',
            'extension_name' => 'sometimes|nullable|alpha_spaces|max:255',

            'mothertongue' => 'required|alpha_spaces|max:255',
            'birthplace' => 'required|alpha_spaces|max:255',

            'lastname' => 'required|max:255|alpha_spaces',
            'lrnnumber'=> 'required|digits:12|unique:users',
            'phonenumber' => 'required|digits:11|starts_with:63|unique:users',

            'indigencyradio' => 'required|in:YES,NO',
            'indigency' => 'sometimes|nullable|required_if:indigencyradio,YES|digits:18',

            'indegenouscommunityradio' => 'required|in:YES,NO',
            'indegenouscommunity' => 'sometimes|nullable|required_if:indegenouscommunityradio,YES|alpha_spaces',

            'psastatus' => 'required|in:YES,NO',
            'psanumber' => 'sometimes|nullable|required_if:psastatus,YES|digits:12',

            'studenttype' => 'required|in:Old Student,Transferee,Balik Aral/Returning Student',

            'lastschoolyearattended' => 'sometimes|nullable|required_if:studenttype,Transferee,Balik Aral/Returning Student|digits:4',

            'lastschoolattended' => 'sometimes|nullable|required_if:studenttype,Transferee,Balik Aral/Returning Student|alpha_spaces',

            'schoolid' => 'sometimes|nullable|required_if:studenttype,Transferee,Balik Aral/Returning Student|digits:6',


            'fatherphonenumber' => 'sometimes|nullable|digits:11|starts_with:63',
            'motherphonenumber' => 'sometimes|nullable|digits:11|starts_with:63',
            'guardianphonenumber' => 'required|digits:11|starts_with:63',

            'fatherfirstname' => 'required|max:255|alpha_spaces',
            'fathermiddlename' => 'sometimes|nullable|alpha_spaces|max:255',
            'fatherlastname' => 'required|max:255|alpha_spaces',

            'guardianfirstname' => 'required|max:255|alpha_spaces',
            'guardianmiddlename' => 'sometimes|nullable|alpha_spaces|max:255',
            'guardianlastname' => 'required|max:255|alpha_spaces',

            'motherfirstname' => 'required|max:255|alpha_spaces',
            'mothermiddlename' => 'sometimes|nullable|alpha_spaces|max:255',
            'motherlastname' => 'required|max:255|alpha_spaces',



            'currentzipcode'=> 'required|digits:4',
            'currenthousenumber'=> 'sometimes|nullable',
            'currentstreet' => 'sometimes|nullable|max:255|alpha_spaces',
            'currentbaranggay' => 'required|max:255|alpha_spaces',
            'currentmunicipality' => 'required|max:255|alpha_spaces',
            'currentcountry' => 'required|max:255|alpha_spaces',
            'currentprovince' => 'required|max:255|alpha_spaces',

            'permanentyes' => 'required|in:YES,NO',
         
            'permanentzipcode'=> 'sometimes|nullable|digits:4',
            'permanenthousenumber'=> 'sometimes|nullable',
            'permanentstreet' => 'sometimes|nullable|required_if:permanentyes,NO|max:255|alpha_spaces',
            'permanentbaranggay' => 'sometimes|nullable|required_if:permanentyes,NO|max:255|alpha_spaces',
            'permanentmunicipality' => 'sometimes|nullable|required_if:permanentyes,NO|max:255|alpha_spaces',
            'permanentcountry' => 'sometimes|nullable|required_if:permanentyes,NO|max:255|alpha_spaces',
            'permanentprovince' => 'sometimes|nullable|required_if:permanentyes,NO|max:255|alpha_spaces',

            'modality' => 'required',

            'chooseFile' => 'required|image',
            'chooseFile2' => 'required|image'
          ]);

      
//dd('failed');

    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
    $password = substr($random, 0, 10);

   $date = Carbon::now();


      if (isset($request['permanentyes'])) {

         $request['permanentcountry'] = $request['currentcountry'];
          $request['permanentzipcode'] = $request['currentzipcode']; 
          $request['permanentstreet'] = $request['currentstreet']; 
          $request['permanentbaranggay'] = $request['currentbaranggay'];
          $request['permanenthousenumber'] = $request['currenthousenumber'];
          $request['permanentmunicipality'] = $request['currentmunicipality'];
          $request['permanentprovince'] = $request['currentprovince'];

        // dd($request['currentprovince']); 


      }



        if ($request['indegenouscommunityradio'] == 'NO' ) {

          $request['indegenouscommunity'] = 'Not Applicable';
        
           }
         
       //  dd($request['indegenouscommunity']);

      if ($request['gradeleveltoenrolin'] == 'Grade 7' ) {

          $request['semester'] = 'Not Applicable';
          $request['strandtoenrolin'] = 'Not Applicable';

           }
         
      if ($request['gradeleveltoenrolin'] == 'Grade 8' ) {

          $request['semester'] = 'Not Applicable';
          $request['strandtoenrolin'] = 'Not Applicable';

           }

      if ($request['gradeleveltoenrolin'] == 'Grade 9' ) {

              $request['semester'] = 'Not Applicable';
              $request['strandtoenrolin'] = 'Not Applicable';

               }
             
      if ($request['gradeleveltoenrolin'] == 'Grade 10' ) {

              $request['semester'] = 'Not Applicable';
              $request['strandtoenrolin'] = 'Not Applicable';
              
               }

      if ( $request['studenttype'] == 'Old Student' ) {

          $request['lastgradelevelcompleted'] = 'Not Applicable';
          $request['lastschoolyearattended'] = 'Not Applicable';
          $request['lastschoolattended'] = 'Not Applicable';
          $request['schoolid'] = 'Not Applicable';
      
           }

      else{

      $year_end = $request['lastschoolyearattended'] + 1;

     $request['lastschoolyearattended'] = $request['lastschoolyearattended'].'-'.$year_end;

          } 

//dd($request['lastschoolyearattended']);

      $file =  $request['chooseFile'];
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/requirements';
                $filename = $file_extension;
                $request['chooseFile']->move($destination_path, $filename);
                $request['chooseFile'] = $filename;
                $birthcertificate = $request['chooseFile']; 

        $file2 =  $request['chooseFile2'];
                $file_extension = $file2->getClientOriginalName();
                $destination_path = public_path() . '/requirements';
                $filename2 = $file_extension;
                $request['chooseFile2']->move($destination_path, $filename);
                $request['chooseFile2'] = $filename2;
                $reportcard = $request['chooseFile2']; 
 


        $user = User::create([
         
            'email' => $request['email'],
            'password' => Hash::make($password),
            'name' => strtoupper($request['name']),
            'middlename' => strtoupper($request['middlename']),
            'lastname' => strtoupper($request['lastname']),
            'extensionname' => strtoupper($request['extension_name']),

          'lastgradelevelcompleted' => $request['lastgradelevelcompleted'] ,
          'strandtoenrolin' => $request['strandtoenrolin'],
          'semester'=> $request['semester'],
          'studenttype'=> $request['studenttype'],
          'indegenouscommunity' => strtoupper($request['indegenouscommunity']),
          'indigency'=> $request['indigency'],

          'currentstreet' => strtoupper($request['currentstreet']),
          'currentzipcode' => $request['currentzipcode'],
          'currentcountry' => strtoupper($request['currentcountry']),
          'currentbaranggay' => strtoupper($request['currentbaranggay']),
          'currenthousenumber' => $request['currenthousenumber'],
          'currentbaranggay' => strtoupper($request['currentbaranggay']),
          'currentmunicipality' => strtoupper($request['currentmunicipality']),
          'currentprovince' => strtoupper($request['currentprovince']),

          'permanentstreet' => strtoupper($request['permanentstreet']),
          'permanentzipcode' => $request['permanentzipcode'],
          'permanentcountry' => strtoupper($request['permanentcountry']),
          'permanenthousenumber'=> $request['permanenthousenumber'],
          'permanentbaranggay' => strtoupper($request['permanentbaranggay']),
          'permanentmunicipality'=>strtoupper($request['permanentmunicipality']),
          'permanentprovince'=>strtoupper($request['permanentprovince']),

          'phonenumber'=>$request['phonenumber'],
          'birthday'=>$request['birthday'], 
          'age'=>$request['age'],
          'sex' =>$request['sex'],
          'mothertongue'=> strtoupper($request['mothertongue']),
         
          'birthplace' =>$request['birthplace'],
          'generalaverage' =>$request['generalaverage'],
          'lrnnumber' =>$request['lrnnumber'],
          'psastatus' =>$request['psastatus'],
          'psanumber' =>$request['psanumber'],

          'fatherfirstname' =>strtoupper($request['fatherfirstname']),
          'fathermiddlename' =>strtoupper($request['fathermiddlename']),
          'fatherlastname' =>strtoupper($request['fatherlastname']),
          'fatherphonenumber' =>$request['fatherphonenumber'],
          'motherfirstname' =>strtoupper($request['motherfirstname']),
          'mothermiddlename' =>strtoupper($request['mothermiddlename']),
          'motherlastname' =>strtoupper($request['motherlastname']),
          'motherphonenumber'=>$request['motherphonenumber'],
          'guardianfirstname' =>strtoupper($request['guardianfirstname']),
          'guardianmiddlename'=>strtoupper($request['guardianmiddlename']),
          'guardianlastname' =>strtoupper($request['guardianlastname']),
          'guardianphonenumber'=>$request['guardianphonenumber'],
          'gradeleveltoenrolin' =>$request['gradeleveltoenrolin'],
          'lastschoolyearattended' =>$request['lastschoolyearattended'],
          'lastschoolattended' =>strtoupper($request['lastschoolattended']),
          'schoolid'=>$request['schoolid'],
          'birthcertificate' =>  $filename,
          'reportcard' =>  $filename2,
          'updated' => 'No',
          'semester' => $request['semester']
        ]);

      DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'email_verified_at' => $date
                 ]);


        $user->roles()->attach(4);


       if (isset($request['modality'])) {
        $user->modalities()->attach($request['modality']);
        } 
        

        session()->flash('success','Please wait for your enrolment form to be evaluated');
         return redirect(URL('index'));
    }
}
