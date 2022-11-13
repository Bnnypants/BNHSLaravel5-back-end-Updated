<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modality;
use App\Models\User;

class ModalityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modality = Modality::all();

        User::all()->each(function($user) use ($modality){
            $user->modalities()->attach(

                $modality->random(4)->pluck('id')

            );

        });
    }
}
