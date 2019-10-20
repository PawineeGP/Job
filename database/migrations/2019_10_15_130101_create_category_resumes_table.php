<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_resumes', function (Blueprint $table) {
            $table->integer('resume_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
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
        Schema::dropIfExists('category_resumes');
    }
}
