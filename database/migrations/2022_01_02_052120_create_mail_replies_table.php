<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_message_id')->constrained('mail_messages')->cascadeOnDelete();
            $table->string('reply_subject');
            $table->string('reply_email');
            $table->longText('reply_message');
            $table->string('name')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('mail_replies');
    }
}
