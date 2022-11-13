<?php

namespace App\Http\Controllers\FacultyLoading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers;
use App\Models\SubjectTeacher;
use Illuminate\Support\Facades\Gate;


class InactiveTeachers extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //dd('banana');
           if(Gate::denies('logged-in')){

            dd('no access allowed');
          }
          if(Gate::allows('is-admin')){

    return view('teachers.inactive',['teachers'=> Teachers::where('status','Inactive')->paginate(10)]);

          }

          dd('you need to be an admin');
    }
}
