<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ViewRejectionMessage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {

       $message = DB::table('rejection_messages')->where('id',$id)->first();
       $user = DB::table('users')->where('id',$message->user_id)->first();

               return view('admin.users.rejection_message',
        [
           
        'user' => $user,
        'message' => $message

        ]);
     
    }
}
