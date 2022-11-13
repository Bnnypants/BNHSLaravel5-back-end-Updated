<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ListGenerator extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
  

$gradelevel = $request->gradelevel;
$strand = $request->strand;

if(isset($request->lrnnumber)){

          $this->validate($request, [

            'lrnnumber' => 'required|exists:user_schoolyear,lrnnumber'

          ]);

      $users = DB::table('user_schoolyear')->where('lrnnumber',$request->lrnnumber)->paginate(10);

          $users->appends(['lrnnumber' => $request->lrnnumber]);

    return view ('admin.generatelist',['users'=> $users ,'title' => 'LRN Based Search Results']);

}

if ($request->gradelevel != "Grade 11" && $request->gradelevel != "Grade 12" ) {

     

      if( $request->sortby == "Name" ){

     
      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel, 'sortby' => 'None']);

    return view ('admin.generatelist',['users'=> $users ,'title' => $gradelevel]);

    }


   

 if( $request->sortby == "Sex" ){


      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->orderBy('sex')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Sex']);

    return view ('admin.generatelist',['users'=> $users, 'title' => $gradelevel.' '.'Sorted by Sex']);

    }


  


    if( $request->sortby == "Age" ){


      $users = User::whereHas('roles', function($query) use ($gradelevel){

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->orderBy('age')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel, 'sortby' => 'Age']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by Age']);


    }

    if( $request->sortby == "General Average" ){


      $users = User::whereHas('roles', function($query) use ($gradelevel){

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->orderBy('generalaverage','DESC')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel, 'sortby' => 'General Average']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by General Average']);


    }
 

if( $request->sortby == "Balik Aral/Returning Student" ){


      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('studenttype','Balik Aral/Returning Student')->where('name', 'Accepted');

      })->orderBy('age')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Balik Aral/Returning Student']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Balik Aral/Returning Students']);


    }



if( $request->sortby == "PSA" ){

      $users = User::whereHas('roles', function($query)  use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->whereNotNull('psanumber')->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'PSA']);

    return view ('admin.generatelist',['users'=> $users ,'title' => $gradelevel.' '.'with PSA']);

    }
   
if( $request->sortby == "4Ps ID" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->whereNotNull('indigency')->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'sortby' => '4Ps ID']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'4Ps Members']);

    }
   

if( $request->sortby == "Modular(Print)" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Modular(Print)');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Modular(Print)']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Modular(Print) Modality']);

    }

if( $request->sortby == "Modular(Digital)" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Modular(Digital)');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Modular(Digital)']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Modular(Digital) Modality']);

    }
     
if( $request->sortby == "Online" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Online');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Online']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Online Modality']);

    }

if( $request->sortby == "Educational Television" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Educational Television');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Educational Television']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Educational Television Modality']);

    }

if( $request->sortby == "Educational Television" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Educational Television');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Educational Television']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Educational Television Modality']);

    }


if( $request->sortby == "Radio-Based Instruction" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Radio-Based Instruction');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Radio-Based Instruction']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Radio-Based Instruction Modality']);

    }

if( $request->sortby == "Homeschooling" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Homeschooling');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Homeschooling']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Homeschooling Modality']);

    }

if( $request->sortby == "Blended" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Blended');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Blended']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Blended Modality']);

    }
 
 if( $request->sortby == "Face to Face" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Face to Face');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Face to Face']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Face to Face Modality']);

    }

 
 if( $request->sortby == "Baranggay" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->orderBy('currentbaranggay')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Face to Face']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by  Current Baranggay']);

    }

     if( $request->sortby == "Municipality" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('name', 'Accepted');

      })->orderBy('currentmunicipality')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'sortby' => 'Face to Face']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by  Current Municipality']);

    }
   }

//SHS

else {

     

      if( $request->sortby == "Name" ){

     
      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel, 'strand' => $strand, 'sortby' => 'None']);

    return view ('admin.generatelist',['users'=> $users ,'title' => $gradelevel]);

    }


   

 if( $request->sortby == "Sex" ){

     
      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->orderBy('sex')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand, 'sortby' => 'Sex']);

    return view ('admin.generatelist',['users'=> $users, 'title' => $gradelevel.' '.'Sorted by Sex']);

    }


  


    if( $request->sortby == "Age" ){


      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->orderBy('age')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel,'strand' => $strand, 'sortby' => 'Age']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by Age']);


    }

 if( $request->sortby == "General Average" ){


      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->orderBy('generalaverage','DESC')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel,'strand' => $strand, 'sortby' => 'General Average']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by General Average']);


    }


 

if( $request->sortby == "Balik Aral/Returning Student" ){


    $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('studenttype','Balik Aral/Returning Student')->where('name', 'Accepted');

      })->orderBy('age')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand, 'sortby' => 'Balik Aral/Returning Student']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Balik Aral/Returning Students']);


    }

if( $request->sortby == "Transferee" ){

    $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('studenttype','Transferee/Moving In')->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand,'sortby' => 'Transferee']);

    return view ('admin.generatelist',['users'=> $users, 'title' => $gradelevel.' '.'Transferee /Moving In Students']);

    }



if($request->sortby == "Old Student" ){

 

      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('studenttype','Old Student')->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand, 'sortby' => 'Old Student']);

    return view ('admin.generatelist',['users'=> $users ,'title' => $gradelevel.' '.'Old Students']);

    }
   

if( $request->sortby == "Re-enrollee" ){


      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Re-enrollee');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Re-enrollee']);

    return view ('admin.generatelist',['users'=> $users, 'title' => $gradelevel.' '.'Re-enrollee Students']);

    }


if( $request->sortby == "PSA" ){

        $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->whereNotNull('psanumber')->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'PSA']);

    return view ('admin.generatelist',['users'=> $users ,'title' => $gradelevel.' '.'with PSA']);

    }
   
if( $request->sortby == "4Ps ID" ){

     
        $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->whereNotNull('indigency')->where('name', 'Accepted');

      })->orderBy('name')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand, 'sortby' => '4Ps ID']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'4Ps Members']);

    }
   

if( $request->sortby == "Modular(Print)" ){

        $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Modular(Print)');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Modular(Print)']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Modular(Print) Modality']);

    }

if( $request->sortby == "Modular(Digital)" ){

        $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {
  
      $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Modular(Digital)');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand, 'sortby' => 'Modular(Digital)']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Modular(Digital) Modality']);

    }
     
if( $request->sortby == "Online" ){

        $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Online');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand, 'sortby' => 'Online']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Online Modality']);

    }

if( $request->sortby == "Educational Television" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Educational Television');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Educational Television']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Educational Television Modality']);

    }

if( $request->sortby == "Educational Television" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Educational Television');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Educational Television']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Educational Television Modality']);

    }


if( $request->sortby == "Radio-Based Instruction" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Radio-Based Instruction');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand, 'sortby' => 'Radio-Based Instruction']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Radio-Based Instruction Modality']);

    }

if( $request->sortby == "Homeschooling" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Homeschooling');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Homeschooling']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Homeschooling Modality']);

    }

if( $request->sortby == "Blended" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Blended');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel ,'strand' => $strand, 'sortby' => 'Blended']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Blended Modality']);

    }
 
 if( $request->sortby == "Face to Face" ){

      $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->whereHas('modalities', function($query) {

      $query->where('name', 'Face to Face');

      })->orderBy('name')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Face to Face']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Face to Face Modality']);

    }

     if( $request->sortby == "Baranggay" ){

 $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->orderBy('currentbaranggay')->paginate(10);



    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Face to Face']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by  Current Baranggay']);

    }

     if( $request->sortby == "Municipality" ){


 $users = User::whereHas('roles', function($query) use ($gradelevel ,$strand) {

  $query->where('gradeleveltoenrolin',$gradelevel)->where('strandtoenrolin',$strand)->where('name', 'Accepted');

      })->orderBy('currentmunicipality')->paginate(10);


    $users->appends(['gradelevel' => $gradelevel , 'strand' => $strand,'sortby' => 'Face to Face']);

    return view ('admin.generatelist',['users'=> $users,'title' => $gradelevel.' '.'Sorted by  Current Municipality']);


}
}
    }
}
