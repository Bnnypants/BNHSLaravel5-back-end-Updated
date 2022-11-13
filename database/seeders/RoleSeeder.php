<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory()->times(count:10)->create();
        DB::table('roles')->insert([

            'name' => 'Admin'

        ]);
       DB::table('roles')->insert([
            
            'name' => 'Accepted'

        ]);

       DB::table('roles')->insert([
            
            'name' => 'Re-enrollee'

        ]);
       DB::table('roles')->insert([
            
            'name' => 'Pending'

        ]);

      DB::table('roles')->insert([
            
            'name' => 'Declined'

        ]);

      DB::table('roles')->insert([
            
            'name' => 'Disabled'

        ]);


           DB::table('roles')->insert([
            
            'name' => 'Blocked'

        ]);
    
    }
}
