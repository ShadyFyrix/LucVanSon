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
        Schema::create('lvs_nhacc', function (Blueprint $table) {
            $table->char('lvs_MaNCC', 3)->primary();
            $table->string('lvs_TenNCC', 100);
            $table->string('lvs_Diachi', 200);
            $table->string('lvs_Dienthoai', 20);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_nhacc');
    }
};
