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
        Schema::create('lvs_vattu', function (Blueprint $table) {
            //$table->id(); mặc định id là khoá chinhs
            $table->char('lvs_Mavtu', 4)->primary();
            $table->string('lvs_TenVtu', 100);
            $table->string('lvs_Dvtinh', 10);
            $table->float('lvs_Phantram');
            //$table->timestamps(); Tạo trường mặc định
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_vattu');
    }
};
