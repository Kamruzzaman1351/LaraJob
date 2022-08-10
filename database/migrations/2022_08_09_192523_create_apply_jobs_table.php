<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('hear_about');
            $table->string('eng_profic');
            $table->longText('good_fit');
            $table->longText('life_goal');
            $table->longText('ideal_job');
            $table->longText('hardest_thing');
            $table->longText('team_member');
            $table->string('working');
            $table->string('current_salary');
            $table->string('expected_salary');
            $table->longText('about_you');
            $table->string('file_cv');
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
        Schema::dropIfExists('apply_jobs');
    }
};
