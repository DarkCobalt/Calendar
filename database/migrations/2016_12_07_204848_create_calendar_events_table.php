<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('calendar_id')->nullable();
            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('user_id', 'calendar_events_users_id_foreign')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('calendar_id', 'calendar_events_calendar_id_foreign')->references('id')->on('calendars')->onDelete('cascade');
            $table->foreign('event_id', 'calendar_events_event_id_foreign')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->dropForeign('calendar_events_users_id_foreign');
            $table->dropForeign('calendar_events_calendar_id_foreign');
            $table->dropForeign('calendar_events_event_id_foreign');
        });

        Schema::dropIfExists('calendar_events');
    }
}
