<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class EmailView extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
           $user =   DB::table('users')->where('id',$request->id)->first();

        if(!$user){
            session()->flash('error','Something went wrong');
         return redirect(URL('index'));
        }


             DB::table('users')->where('id',$request->id)->update([

            'email' =>  $request['email'],

             ]);


        session()->flash('success','Your email has been updated');
         return redirect(URL('index'));
    }
}
