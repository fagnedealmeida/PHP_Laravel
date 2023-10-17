<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('numero');
            $table->foreignId('season_id')->constrained()->onDelete('cascade');
            $table->boolean('watched')->default(false);
            
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
};
