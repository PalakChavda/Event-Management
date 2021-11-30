<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("event_title");
            $table->date("start_date");
            $table->date("end_date");
            $table->enum('recurrence', ['repeat', 'repeat_on']);
            $table->enum('repeat_time', ['1', '2','3','4'])->nullable();
            $table->enum('repeat_on_time', ['1', '2','3','4'])->nullable();
            $table->enum('cycle', ['day', 'week','month','year'])->nullable();
            $table->enum('week_of_day', ['sun', 'mon','tue','wed','thu','fri','sat'])->nullable();
            $table->enum('months', ['month','3month', '4month','6month','year'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
