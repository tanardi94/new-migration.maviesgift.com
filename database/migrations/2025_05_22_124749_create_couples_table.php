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
        Schema::create('couples', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('bride_name');
            $table->string('groom_name');
            $table->string('bride_mother_name')->nullable();
            $table->string('groom_mother_name')->nullable();
            $table->string('bride_father_name')->nullable();
            $table->string('groom_father_name')->nullable();
            $table->string('gift_account_name')->nullable();
            $table->string('gift_account_number')->nullable();
            $table->string('gift_type')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couples');
    }
};
