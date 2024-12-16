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
        Schema::create('lvs_ctdonDH', function (Blueprint $table) {
            $table->char('lvs_SoDH', 4);
            $table->char('lvs_Mavtu', 4);
            $table->integer('lvs_SLDat');
            
            $table->primary(['lvs_SoDH', 'lvs_Mavtu']);
            $table->foreign('lvs_SoDH')->references('lvs_SoDH')->on('lvs_donDH');
            $table->foreign('lvs_Mavtu')->references('lvs_Mavtu')->on('lvs_vattu');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_ctdondh');
    }
};
