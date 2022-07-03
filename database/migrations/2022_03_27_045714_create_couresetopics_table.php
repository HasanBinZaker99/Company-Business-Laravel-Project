<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouresetopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couresetopics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('module_name');
            $table->string('module_class');
            $table->bigInteger('coursedetail_id')->unsigned();
            $table->foreign('coursedetail_id')->references('id')->on('coursedetails')->cascadeOnDelete();
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
        Schema::dropIfExists('couresetopics');
    }
}
