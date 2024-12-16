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
        Schema::create('lvs_donDH', function (Blueprint $table) {
            $table->char('lvs_SoDH', 4)->primary();
            $table->dateTime('lvs_NgayDH');
            $table->char('lvs_MaNCC', 3);
            
            $table->foreign('lvs_MaNCC')->references('lvs_MaNCC')->on('lvs_nhacc');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_dondh');
    }
};
