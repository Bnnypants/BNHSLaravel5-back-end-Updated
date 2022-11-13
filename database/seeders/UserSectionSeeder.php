<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sections;

class UserSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $sections = Sections::all();

          
        foreach($sections as $section){

                
              $id = $section->id;

              $users = User::whereHas('roles', function($query) use ($id) {

              $query->where('section',$id)->where('name', 'Accepted');

              })->count();

              
           $section = Sections::find($id);
           $section->admission_count = $users;
           $section->save();


        }
    }
}
