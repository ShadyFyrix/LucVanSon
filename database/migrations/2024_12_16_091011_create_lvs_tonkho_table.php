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
        Schema::create('lvs_tonkho', function (Blueprint $table) {
            $table->char('lvs_NamThang', 6);
            $table->char('lvs_Mavtu', 4);
            $table->integer('lvs_SLDau');
            $table->integer('lvs_TongSLN');
            $table->integer('lvs_TongSLX');
            $table->integer('lvs_SLCuoi');
            
            $table->primary(['lvs_NamThang', 'lvs_Mavtu']);
            $table->foreign('lvs_Mavtu')->references('lvs_Mavtu')->on('lvs_vattu');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_tonkho');
    }
};
