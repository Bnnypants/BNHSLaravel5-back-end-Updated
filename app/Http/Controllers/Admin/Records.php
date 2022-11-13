<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Records extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        //dd($id);

        $user = DB::table('user_schoolyear')->where('id',$id)->first();

        $current =  DB::table('users')->where('lrnnumber',$user->lrnnumber)->first();

        $modality = DB::table('user_schoolyear_modality')->where('user_id',$user->user_id)->get();

            return view('admin.users.partials.records',['user' => $user ,'modalities' => $modality,'current' => $current->id]);
    }
}
