<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentProfileView extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    
     $id = Auth::id(); 
    $user = User::find($id);

    return view('student.studentprofile',['user' => $user, 'modalities' =>DB::table('modality_user')->where('user_id',$id)->get()]);
    }
}
