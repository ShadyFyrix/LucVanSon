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
        Schema::create('lvs_ctpNhap', function (Blueprint $table) {
            $table->char('lvs_SoPn', 4);
            $table->char('lvs_Mavtu', 4);
            $table->integer('lvs_SLNhap');
            $table->float('lvs_DGNhap');
            
            $table->primary(['lvs_SoPn', 'lvs_Mavtu']);
            $table->foreign('lvs_SoPn')->references('lvs_SoPn')->on('lvs_pnhap');
            $table->foreign('lvs_Mavtu')->references('lvs_Mavtu')->on('lvs_vattu');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_ctpnhap');
    }
};
