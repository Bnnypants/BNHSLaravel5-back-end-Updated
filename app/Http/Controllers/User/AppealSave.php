<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppealSave extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //dd($request->all());

            DB::table('appeals')->insert([
            'user_id' =>  $request['id'],
             'message' =>  $request['specification'],
            'status' =>  'Pending'
             ]);

   $request->session()->flash('success','You have successfully submitted an appeal. Please wait for its evaluation');
    return redirect(URL('index'));
    }
}
