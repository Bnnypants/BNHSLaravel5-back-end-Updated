<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSchoolyear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_schoolyear', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('schoolyear_start');
            $table->string('schoolyear_end');
        
            $table->string('name')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('extensionname')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('accepted_as')->nullable();
            $table->string('studenttype')->nullable();
            $table->string('lastschoolyearattended')->nullable();
            $table->string('lastschoolattended')->nullable();
            $table->string('lastgradelevelcompleted')->nullable();
            $table->string('schoolid')->nullable();
             
          
            $table->string('gradeleveltoenrolin')->nullable();
            $table->string('strandtoenrolin')->nullable();
            $table->string('semester')->nullable();

            $table->string('birthplace')->nullable();
     
            $table->integer('permanenthousenumber')->nullable();
            $table->string('permanentzipcode')->nullable();
            $table->string('permanentstreet')->nullable();
            $table->string('permanentbaranggay')->nullable();
            $table->string('permanentmunicipality')->nullable();
            $table->string('permanentprovince')->nullable();
            $table->string('permanentcountry')->nullable();

            $table->integer('currenthousenumber')->nullable();
            $table->string('currentzipcode')->nullable();
            $table->string('currentstreet')->nullable();
            $table->string('currentbaranggay')->nullable();
            $table->string('currentmunicipality')->nullable();
            $table->string('currentprovince')->nullable();
            $table->string('currentcountry')->nullable();

            $table->string('indegenouscommunity')->nullable();
            $table->bigInteger('phonenumber')->nullable();
            $table->string('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('mothertongue')->nullable();
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
            $table->string('last_reviewed_by')->nullable();


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
        Schema::dropIfExists('user_schoolyear');
    }
}
