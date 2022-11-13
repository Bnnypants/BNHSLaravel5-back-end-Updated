<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_number')->nullable();
            $table->string('upper_gwa')->nullable();;
            $table->string('lower_gwa')->nullable();;
            $table->string('grade')->nullable();;
            $table->string('strand')->nullable();
            $table->string('admission_count')->nullable();
            $table->string('admission_limit')->nullable();
            $table->string('admission_status')->nullable();
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
        Schema::dropIfExists('sections');
    }
}
