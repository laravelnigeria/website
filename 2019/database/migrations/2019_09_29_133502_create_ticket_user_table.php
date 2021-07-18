<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('reference');
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('event_id');
            $table->string('event_slug');
            $table->boolean('opt_in_confirmed')->default(false);
            $table->boolean('opted_in_to_be_contacted')->default(false);
            $table->timestamps();

            $table->unique(['email', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_users');
    }
}
