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
        Schema::create('_voluntee_members', function (Blueprint $table) {
            $table->id();
            $table->string('vol_mem_fname');
            $table->string('vol_mem_lname');
            $table->text('vol_mem_address');
            $table->string('vol_mem_province');
            $table->string('vol_mem_ph_num');
            $table->string('vol_mem_email');
            $table->string('vol_mem_get_news');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_voluntee_members');
    }
};
