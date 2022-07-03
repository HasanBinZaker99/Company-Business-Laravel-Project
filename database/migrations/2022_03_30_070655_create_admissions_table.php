<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('studentID');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batches')->cascadeOnDelete();
            $table->date('date');
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_phone');
            $table->string('emergency_phone');
            $table->string('relationwith_emergency_phone');
            $table->string('name_ofrelation_number');
            $table->string('religion');
            $table->string('blood_group');
            $table->string('nid');
            $table->longText('present_address');
            $table->longText('permanent_address');
            $table->string('course_price');
            $table->string('discount');
            $table->string('due');
            $table->string('total_payment');
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
        Schema::dropIfExists('admissions');
    }
}
