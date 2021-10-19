<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('name_of_the_post_bn')->nullable();
            $table->string('applicants_name')->nullable();
            $table->string('applicants_name_bn')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('date_Of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->bigInteger('national_id')->nullable();
            $table->bigInteger('birth_registration')->nullable();
            $table->bigInteger('passport_id')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('image')->nullable();
            $table->string('signature_img')->nullable();
            $table->string('present_care_of')->nullable();
            $table->string('present_village')->nullable();
            $table->string('present_district')->nullable();
            $table->string('present_upazila')->nullable();
            $table->string('present_post_office')->nullable();
            $table->integer('present_post_code')->nullable();
            $table->string('same_as_present_address')->default(false);

            $table->string('permanent_care_of')->nullable();
            $table->string('permanent_village')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_upazila')->nullable();
            $table->string('permanent_post_office')->nullable();
            $table->integer('permanent_post_code')->nullable();
            $table->bigInteger('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('ssc_examination')->nullable();
            $table->integer('ssc_roll_no')->nullable();
            $table->bigInteger('ssc_registration_no')->nullable();
            $table->string('ssc_group_subject')->nullable();
            $table->string('ssc_board')->nullable();
            $table->string('ssc_result')->nullable();
            $table->integer('ssc_passing_year')->nullable();
            $table->string('hsc_examination')->nullable();
            $table->integer('hsc_roll_no')->nullable();
            $table->bigInteger('hsc_registration_no')->nullable();
            $table->string('hsc_group_subject')->nullable();
            $table->string('hsc_board')->nullable();
            $table->string('hsc_result')->nullable();
            $table->integer('hsc_passing_year')->nullable();
            $table->string('graduation_examination')->nullable();
            $table->string('graduation_institute')->nullable();
            $table->integer('graduation_passing_year')->nullable();
            $table->string('graduation_subject_degree')->nullable();
            $table->string('graduation_result')->nullable();
            $table->string('graduation_course_duration')->nullable();
            $table->string('masters_examination')->nullable();
            $table->string('masters_institute')->nullable();
            $table->integer('masters_passing_year')->nullable();
            $table->string('masters_subject_degree')->nullable();
            $table->string('masters_result')->nullable();
            $table->string('masters_course_duration')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('registrations');
    }
}
