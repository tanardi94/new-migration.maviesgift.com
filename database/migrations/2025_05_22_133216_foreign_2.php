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
        Schema::table('seats', function (Blueprint $table) {
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
        });

        Schema::table('tables', function (Blueprint $table) {
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
        });

        Schema::table('social_logins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('venues', function (Blueprint $table) {
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seats', function (Blueprint $table) {
            $table->dropForeign(['table_id']);
            $table->dropForeign(['guest_id']);
        });

        Schema::table('tables', function (Blueprint $table) {
            $table->dropForeign(['venue_id']);
        });

        Schema::table('social_logins', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('venues', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
        });
    }
};
