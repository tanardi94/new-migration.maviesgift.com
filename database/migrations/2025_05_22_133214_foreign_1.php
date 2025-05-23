<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add this line (assuming 'user_id' is a foreign key in 'users' table)
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('couple_id')->references('id')->on('couples')->onDelete('cascade');
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['couple_id']);
            $table->dropForeign(['venue_id']);
            $table->dropForeign(['template_id']);
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });
    }
};
