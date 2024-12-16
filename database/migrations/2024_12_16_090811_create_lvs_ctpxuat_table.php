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
        Schema::create('lvs_ctpXuat', function (Blueprint $table) {
            $table->char('lvs_SoPx', 4);
            $table->char('lvs_Mavtu', 4);
            $table->integer('lvs_SLXuat');
            $table->float('lvs_DGXuat');
            
            $table->primary(['lvs_SoPx', 'lvs_Mavtu']);
            $table->foreign('lvs_SoPx')->references('lvs_SoPx')->on('lvs_pxuat');
            $table->foreign('lvs_Mavtu')->references('lvs_Mavtu')->on('lvs_vattu');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_ctpxuat');
    }
};
