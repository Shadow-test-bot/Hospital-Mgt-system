<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorDetailsToDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->text('education')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('biography')->nullable();
            $table->string('languages')->nullable();
            $table->text('certifications')->nullable();
            $table->text('awards')->nullable();
            $table->text('working_hours')->nullable();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn(['education', 'experience_years', 'biography', 'languages', 'certifications', 'awards', 'working_hours', 'address']);
        });
    }
}
