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
        Schema::create('module_histories', function (Blueprint $table) {
            $table->id('Id_ModuleHistory');
            $table->foreignId('Id_Module')->references('Id_Module')->on('modules');
            $table->float('value');
            $table->timestamp('created_at')->useCurrent(); 
            $table->timestamp('updated_at')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_histories');
    }
};
