<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_type_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lawyer_id');
            $table->string('title')->nullable();
            $table->string('caseDate')->nullable();
            $table->string('coteDate')->nullable();
            $table->string('document')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->default('0')->comment('
             0, chancel case
             1, new case,
             2, progressing
             3, running case,
             4, in complete case,
             5, case successfully done,
            ');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('cases');
    }
}
