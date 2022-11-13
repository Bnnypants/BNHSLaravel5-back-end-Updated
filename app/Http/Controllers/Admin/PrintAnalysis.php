<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;


class PrintAnalysis extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

       $past_g7 = $request->past_g7;
       $past_g8 = $request->past_g8;
       $past_g9 = $request->past_g9;
       $past_g10 = $request->past_g10;
       $past_g11 = $request->past_g11;
       $past_g12 = $request->past_g12;

        $past_gas = $request->past_gas;
        $past_humms = $request->past_humms;
        $past_tvl = $request->past_tvl;
        $past_cookery = $request->past_cookery;
        $past_ict = $request->past_ict;
        $past_abm = $request->past_abm;
        $past_stem = $request->past_stem;

        $present_gas = $request->present_gas;
        $present_humms = $request->present_humms;
        $present_tvl = $request->present_tvl;
        $present_cookery = $request->present_cookery;
        $present_ict = $request->present_ict;
        $present_abm = $request->present_abm;
        $present_stem = $request->present_stem;

        $present_g7 = $request->present_g7;
        $present_g8 = $request->present_g8;
        $present_g9 = $request->present_g9;
        $present_g10 = $request->present_g10;
        $present_g11 = $request->present_g11;
        $present_g12 = $request->present_g12;

        $pdf = PDF::loadView('myPDF',compact(

        'past_g7',
        'past_g8',
        'past_g9',
        'past_g10',
        'past_g11',
        'past_g12',

        'past_gas',
        'past_humms',
        'past_tvl',
        'past_cookery',
        'past_ict',
        'past_abm',
        'past_stem',

        'present_gas', 
        'present_humms', 
        'present_tvl',
        'present_cookery',
        'present_ict' ,
        'present_abm' ,
        'present_stem' ,

        'present_g7',
        'present_g8',
        'present_g9',
        'present_g10',
        'present_g11',
        'present_g12'
        ));
  
        return $pdf->download( 'S.Y. Data Analysis'.' '.'List.pdf');
    }
}
