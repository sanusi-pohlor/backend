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
        Schema::create('_details_noti_channels', function (Blueprint $table) {
            $table->id();
            $table->string('dnc_med_id');
            $table->string('dnc_info_id');
            $table->string('dnc_pub_id');
            $table->string('dnc_fm_d_id');
            $table->string('dnc_prob_id');
            $table->string('dnc_scop_pub');
            $table->string('dnc_num_mem_med');
            $table->string('dnc_date_med');
            $table->string('dnc_capt');
            $table->string('dnc_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_details_noti_channels');
    }
};
