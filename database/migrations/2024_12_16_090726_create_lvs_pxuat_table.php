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
        Schema::create('lvs_pxuat', function (Blueprint $table) {
            $table->char('lvs_SoPx', 4)->primary();
            $table->dateTime('lvs_NgayXuat');
            $table->string('lvs_TenKH', 100);
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_pxuat');
    }
};
