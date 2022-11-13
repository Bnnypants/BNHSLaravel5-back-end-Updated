<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grades;
use App\Models\Announcements;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          DB::table('announcements')->insert([

            'content' => "In light of the upcoming “Undas” Season, please take note of the Academic Break that's just around the corner.

              During this period, there will be no Synchronous classes (Face-to-Face and Online) and Asynchronous activities",

            'title' => 'Undas',
            'image' => 'undas.webp'
     
        ]);


      $grades = Grades::all();

        Announcements::all()->each(function($announcements) use ($grades){
            $announcements->grades()->attach(

                $grades->random(3)->pluck('id')

            );

        });
    }
}
