<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterView extends Controller
{
   public function __invoke(Request $request)
    {

           return view('auth.register',['email' => $request['email'],'lrnnumber' => $request['lrnnumber'] ]);
      
    

    }
}
