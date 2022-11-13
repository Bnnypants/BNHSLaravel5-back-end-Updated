<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;

class PrintList extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {  

    $lists = $request->users;
    $title = $request->title;
//dd($lists);
        $pdf = PDF::loadView('myPDF',compact('lists' ,'title'));
  
        return $pdf->download( $request->title.' '.'List.pdf');
    }
}
