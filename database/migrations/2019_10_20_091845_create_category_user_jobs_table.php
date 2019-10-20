<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryUserJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_user_jobs', function (Blueprint $table) {         
            $table->integer('user_job_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
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
        Schema::dropIfExists('category_user_jobs');
    }
}
