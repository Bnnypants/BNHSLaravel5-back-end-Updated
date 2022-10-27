<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('accepted_as')->nullable();
            $table->string('studenttype')->nullable();
            $table->string('lastschoolyearattended')->nullable();
            $table->string('lastschoolattended')->nullable();
            $table->string('lastgradelevelcompleted')->nullable();
            $table->string('schoolid')->nullable();
             
          
            $table->string('gradeleveltoenrolin')->nullable();
            $table->string('strandtoenrolin')->nullable();
            $table->string('semester')->nullable();
     
            $table->integer('permanenthousenumber')->nullable();
            $table->string('permanentbaranggay')->nullable();
            $table->string('permanentmunicipality')->nullable();
            $table->string('permanentprovince')->nullable();

            $table->integer('currenthousenumber')->nullable();
            $table->string('currentbaranggay')->nullable();
            $table->string('currentmunicipality')->nullable();
            $table->string('currentprovince')->nullable();

            $table->string('indegenouscommunity')->nullable();
            $table->bigInteger('phonenumber')->nullable();
            $table->string('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('mothertongue')->nullable();
            $table->string('religion')->nullable();
            $table->string('generalaverage')->nullable();
            $table->bigInteger('lrnnumber')->nullable();
            $table->string('psastatus')->nullable();
            $table->bigInteger('psanumber')->nullable();
            $table->string('indigency')->nullable();
          
            $table->string('fatherfirstname')->nullable();
            $table->string('fathermiddlename')->nullable();
            $table->string('fatherlastname')->nullable();
            $table->string('fatherphonenumber')->nullable();
            $table->string('motherfirstname')->nullable();
            $table->string('mothermiddlename')->nullable();
            $table->string('motherlastname')->nullable();
            $table->string('motherphonenumber')->nullable();
            $table->string('guardianfirstname')->nullable();
            $table->string('guardianmiddlename')->nullable();
            $table->string('guardianlastname')->nullable();
            $table->string('guardianphonenumber')->nullable();

            $table->string('birthcertificate')->nullable();
            $table->string('reportcard')->nullable();
            
            $table->string('updated')->nullable();
            $table->string('updatepermission')->nullable();
            $table->string('section')->nullable();
      

            $table->rememberToken();
            $table->timestamps();
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
         DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
