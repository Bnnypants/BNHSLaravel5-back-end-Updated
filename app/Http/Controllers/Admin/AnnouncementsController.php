<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\Announcements;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;


class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    return view('admin.announcements.index',['announcements' => Announcements::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $file =  $request['chooseFile'];
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path().'/requirements';
                $filename = $file_extension;
                $request['chooseFile']->move($destination_path, $filename);
                $request['chooseFile'] = $filename;
                $birthcertificate = $request['chooseFile']; 

        $announcement = Announcements::create([
         
            'content' => $request['specification'],
            'title' => $request['title'],
            'image' => $filename,

             ]);

      $announcement ->grades()->attach($request['gradelevel']);
   

           $request->session()->flash('success','Announcement has been crated');

               return redirect(route('admin.announcements.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        return view('admin.announcements.view',[ 'announcement' => DB::table('announcements')->where('id',$id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $grades = DB::table('announcements_grades')->where('announcements_id',$id)->get();
    
       
        return view('admin.announcements.edit',
            [ 'announcement' => DB::table('announcements')->where('id',$id)->first(),

            'grades' => $grades
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //dd($request->all());

    if(isset($request['chooseFile'])){

           $file =  $request['chooseFile'];
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path().'/requirements';
                $filename = $file_extension;
                $request['chooseFile']->move($destination_path, $filename);
                $request['chooseFile'] = $filename;
                $birthcertificate = $request['chooseFile']; 

               $announcement = Announcements::find($id);
               $announcement->content = $request['specification'];
               $announcement->title = $request['title'];
               $announcement->image =  $filename;
               $announcement->grades()->sync($request['gradelevel']);
               $announcement->save();

              $request->session()->flash('success','Announcement has been updated');

               return redirect(route('admin.announcements.index')); 

    }

    else{

    
        
         

               $announcement = Announcements::find($id);
               $announcement->content = $request['specification'];
               $announcement->title = $request['title'];
                $announcement->grades()->sync($request['gradelevel']);
               $announcement->save();


               $request->session()->flash('success','Announcement has been updated');

               return redirect(route('admin.announcements.index')); 

    }
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
    
          Announcements::where('id',$id)->delete();
       $request->session()->flash('error','Announcement have been removed from the database');

        return redirect(route('admin.announcements.index')); 
    }
}
