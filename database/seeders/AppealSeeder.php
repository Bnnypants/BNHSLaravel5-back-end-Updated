<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class AppealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   


$status = ['Pending','Accepted'];
$reason = ['True','False'];

  $roles_users = DB::table('role_user')->where('role_id', '5')->get();
          foreach( $roles_users as $role_user ){

           $user = DB::table('users')->where('id', $role_user->user_id)->first();

             DB::table('rejection_messages')->insert([

             'user_id' => $user->id,
             'reason_1' => array_random($reason),
             'reason_2' => array_random($reason),
             'reason_3' => array_random($reason),
             'reason_4' => array_random($reason),
             'reason_5' => array_random($reason),
             'reason_6' => array_random($reason),
             'reason_7' => array_random($reason),
             'specification' => 'Please follow the instructions carefully',
             'created_at' => Carbon::now()
      
             ]);

             DB::table('appeals')->insert([

            'user_id' => $user->id,
            'status' => array_random($status),
            'message' => "Good day, Sir/Ma'am. I have understood my mistakes and will act in my best behavior in order to be given a chance to enroll to this school. Please consider my appeal",
                'created_at' => Carbon::now()
        ]);

    }

  $roles_users = DB::table('role_user')->where('role_id', '7')->get();

          foreach( $roles_users as $role_user ){

           $user = DB::table('users')->where('id', $role_user->user_id)->first();

             DB::table('appeals')->insert([

            'user_id' => $user->id,
            'status' => 'Rejected',
            'message' => "Good day, Sir/Ma'am. I have understood my mistakes and will act in my best behavior in order to be given a chance to enroll to this school. Please consider my appeal",
            'created_at' => Carbon::now()
        ]);

    }
  }
}