<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutSayYouToRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->text('about_say_you')->nullable()->default(`stare decisis: (stah-ree
            duh-sigh-sis) n. Latin for "to stand by a decision," the doctrine that a trial
            court is bound by appellate court decisions (precedents) on a legal question
            which is raised in the lower court. Reliance on such precedents is required
            of trial courts until such time as an appellate court changes the rule, for
            the trial court cannot ignore the precedent (even when the trial judge
            believes it is "bad law").`);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            //
        });
    }
}
