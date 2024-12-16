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
        Schema::create('lvs_pnhap', function (Blueprint $table) {
            $table->char('lvs_SoPn', 4)->primary();
            $table->dateTime('lvs_NgayNhap');
            $table->char('lvs_SoDH', 4);
            
            $table->foreign('lvs_SoDH')->references('lvs_SoDH')->on('lvs_donDH');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_pnhap');
    }
};
