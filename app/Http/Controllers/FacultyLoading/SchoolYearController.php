<?php

namespace App\Http\Controllers\FacultyLoading;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use App\Models\SchoolYear;
use App\Models\User;
use App\Models\Role;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


$enrolment_start = Carbon::createFromDate($request['year'],$request['month_start'], $request['date_start']);

$enrolment_end = Carbon::createFromDate($request['year'] + 1,$request['month_end'], $request['date_end']);
//dd($enrolment_end->year);
$schoolyear = SchoolYear::create([
    'year_start' => $enrolment_start->year,
    'year_end' => $enrolment_end->year,
    'enrolment_start' => $enrolment_start,
    'enrolment_end' => $enrolment_end,
    'status' => 'active'
]);


Role::where('name', 'Declined')->first()->users()->delete();

Role::where('name', 'Pending')->first()->users()->delete();

Role::where('name', 'Re-enrollee')->first()->users()->delete();

Role::where('name', 'Blocked')->first()->users()->delete();


DB::table('schoolyear')
                ->where('id', $request['current_schoolyear'])
                ->update([
                    'status' => 'inactive'
                 ]);


DB::table('role_user')
                ->where('role_id', '3')->where('role_id','4')->where('role_id','5')->where('role_id','7')
                ->delete();

 DB::table('role_user')
                ->where('role_id', '2')
                ->update([
                    'role_id' => '3'
                 ]);

 $re_enrollees = DB::table('role_user')
                ->where('role_id', '3')->get();

foreach($re_enrollees as $re_enrolee){

$user = DB::table('users')->where('id', $re_enrolee->user_id)->first();


$modalities = DB::table('modality_user')->where('user_id', $re_enrolee->user_id)->get();

foreach($modalities as $modality) {

    DB::table('user_schoolyear_modality')->insert([

             'user_id' =>  $modality->user_id,
            'modality_id' => $modality->modality_id
      ]);
}

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
          'semester' => $user->semester
      
             ]);


}


 $request->session()->flash('success','A new schoolyear is created');
        return redirect(URL::previous());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       // dd($request->all());

        $schoolyear = SchoolYear::find($id);

$enrolment_start = Carbon::createFromDate($request['year'],$request['month_start'], $request['date_start']);

$enrolment_end = Carbon::createFromDate($request['year'] + 1,$request['month_end'], $request['date_end']);

        $schoolyear->year_start = $request['year'];

        $schoolyear->year_end = $request['year'] + 1 ;

        $schoolyear->enrolment_start = $enrolment_start;

        $schoolyear->enrolment_end = $enrolment_end;

        $schoolyear->save();

        $request->session()->flash('success','School Year has been updated');
        return redirect(URL::previous());

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
          //   dd($id);

    if($request['status'] == 'active'){

        DB::table('schoolyear')
                ->where('id', $id)
                ->update([
                    'status' => 'paused'
                 ]);
    }


    if($request['status'] == 'paused'){

        DB::table('schoolyear')
                ->where('id', $id)
                ->update([
                    'status' => 'active'
                 ]);
    }

         $request->session()->flash('success','Status has been changed');
        return redirect(URL::previous());

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
