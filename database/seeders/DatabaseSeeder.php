<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         $this->call(RoleSeeder::class);
              $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
       
      
        $this->call(RoleUserSeeder::class);
        $this->call(ModalitySeeder::class);
        $this->call(ModalityUserSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(SubjectGradeSeeder::class);
        $this->call(StrandsSeeder::class);
        $this->call(StrandsSubjectSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(TeachersSubjectSeeder::class);
        $this->call(SectionsSeeder::class);
         $this->call(SubjectTeachersScheduleSeeder::class);
        $this->call(SectionAdviserID::class);
         $this->call(SchoolYearSeeder::class);
   
        $this->call(AppealSeeder::class);
        $this->call(AnnouncementsSeeder::class);
         $this->call(UserSectionSeeder::class);
    }
}
