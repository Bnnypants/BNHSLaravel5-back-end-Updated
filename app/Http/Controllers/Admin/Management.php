<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Management extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
          if(Gate::denies('logged-in')){

            dd('no access allowed');
          }
          if(Gate::allows('is-admin')){

    return view('admin.admin_management.index',['users'=> 
      User::whereHas('roles', function($query) {
      $query->where('name', 'Admin')->where('user_id', '!=' , Auth::id());

      })->orderBy('id')->paginate(10),'current_user' => DB::table('users')->where('id', Auth::id())->first() ]);

          }

          dd('you need to be an admin');
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    
     return view('admin.users.create',[ 'user' =>User::find($id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
           $role = DB::table('role_user')
                ->where('id', $id)->first();
            
            if($role->role_id == 1){


            DB::table('role_user')
                ->where('id', $id)
                ->update([
                    'role_id' => '6'
                 ]);

       $request->session()->flash('error',"Admin account has been disabled");
        return redirect(route('admin.management.index'));

            };
  
            if($role->role_id == 6){


                        DB::table('role_user')
                            ->where('id', $id)
                            ->update([
                                'role_id' => '1'
                             ]);

        $request->session()->flash('success',"Admin account has been enabled");
        return redirect(url('admin/disabled_admin'));

                        };


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          return view('admin.admin_management.edit',[ 'user' =>User::find($id)]);

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
           $user= User::find($id);
           $user->name = $request['name'];
            $user->middlename = $request['middlename'];
             $user->lastname = $request['lastname'];
             $user->email = $request['email'];

           $user->save();

        $request->session()->flash('success',"Admin account has been updated");
        return redirect(route('admin.management.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
              DB::table('role_user')
                ->where('id', $userrole->id)
                ->update([
                    'role_id' => '4'
                 ]);


        $request->session()->flash('success',"Admin account has been disabled");
        return redirect(route('admin.admin_management.index'));
    }
}
