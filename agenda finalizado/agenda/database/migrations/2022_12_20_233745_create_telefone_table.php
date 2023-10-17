<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->id();
            $table->String('numero');
            
            $table->foreignId('contatos_id')->constrained()->onDelete('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('telefones');
    }
};
