<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
     
     $pending = User::whereDoesnthave('roles', function($query) {
      $query->whereNotNull('email_verified_at');

      })->take(10)->get();

     foreach($pending as $pending){

        DB::table('users')->where('id',$pending->id)->update([

            'updated' => Null

        ]);


        DB::table('role_user')->insert([

            'role_id' => 4,
            'user_id' => $pending->id
        ]);

     }


     $rejected = User::whereDoesnthave('roles', function($query) {
      $query->whereNotNull('email_verified_at');

      })->take(5)->get();

     foreach($rejected as $rejected){

        DB::table('role_user')->insert([

            'role_id' => 5,
            'user_id' => $rejected->id
        ]);

       DB::table('users')->where('id',$pending->id)->update([

            'updated' => 'No'

        ]);

        
     }

     $updated = User::whereDoesnthave('roles', function($query) {
          $query->whereNotNull('email_verified_at');

          })->take(5)->get();

         foreach($updated as $updated){

            DB::table('role_user')->insert([

                'role_id' => 4,
                'user_id' => $updated->id
            ]);

           DB::table('users')->where('id',$updated->id)->update([

                'updated' => 'Yes'

            ]);

            
         }

      $admin = User::whereDoesnthave('roles', function($query) {
      $query->whereNotNull('email_verified_at');

      })->take(5)->get();

     foreach($admin as $admin){

        DB::table('role_user')->insert([

            'role_id' => 1,
            'user_id' => $admin->id
        ]);
        
     }


      $disabled = User::whereDoesnthave('roles', function($query) {
      $query->whereNotNull('email_verified_at');

      })->take(5)->get();

     foreach($disabled as $disabled){

        DB::table('role_user')->insert([

            'role_id' => 6,
            'user_id' => $disabled->id
        ]);
        
     }

      $admin = DB::table('role_user')->where('role_id','1')->first();

     $accepted = User::whereDoesnthave('roles', function($query) {
      $query->whereNotNull('email_verified_at');

      })->take(10)->get();

     $status = ['solved','unsolved'];

     $i = 0;

     foreach($accepted as $accepted){

        $i = $i + 1;

        DB::table('role_user')->insert([

            'role_id' => 2,
            'user_id' => $accepted->id
        ]);
 

    DB::table('issue_reports')->insert([

            'user_id' => $accepted->id,
            'status' =>  array_random($status),

            'title' => 'Inquiry',
            'message' => "I have an inquiry to make, can I visit the school?"
        ]);

    DB::table('issue_reports_reply')->insert([

            'user_id' => 1,

            'issue_reports_id' => $i,
             'created_at' => Carbon::now(),
    
            'message' => "Yes, you may"
        ]);


        
     }


     $re_enrollee = User::whereDoesnthave('roles', function($query) {
      $query->whereNotNull('email_verified_at');

      })->take(10)->get();

     foreach($re_enrollee as $re_enrollee){

        DB::table('role_user')->insert([

            'role_id' => 3,
            'user_id' => $re_enrollee->id
        ]);
        
     }




  
    }
}
