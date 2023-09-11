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
        Schema::create('_information', function (Blueprint $table) {
            $table->id();
            $table->string('info_subp_id');
            $table->string('info_vol_mem_id');
            $table->string('info_moti_id');
            $table->string('info_act_id');
            $table->string('info_d_c_id');
            $table->string('info_det_cont');
            $table->string('info_num_rep');
            $table->date('info_date');
            $table->string('info_status');
            $table->string('info_cont_topic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_information');
    }
};
