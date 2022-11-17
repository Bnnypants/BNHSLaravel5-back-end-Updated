<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = DB::table('users')->insert([

            'name' => 'Maria',
            'middlename' => 'Leonora',
            'lastname' => 'Teresa',
            'email' => 'admin@gmail.com',
            'phonenumber' => '639556841720',
            'section' => 'Not Applicable',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
        ]);

          DB::table('role_user')->insert([

            'role_id' => '1',
            'user_id' => '1'
        ]);
    }
}
