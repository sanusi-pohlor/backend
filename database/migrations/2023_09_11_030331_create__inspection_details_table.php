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
        Schema::create('_inspection_details', function (Blueprint $table) {
            $table->id();
            $table->string('ins_dt_che_id');
            $table->string('ins_dt_info_id');
            $table->date('ins_dt_date');
            $table->text('ins_dt_more');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_inspection_details');
    }
};
