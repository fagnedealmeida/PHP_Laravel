<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->String('nome');
            $table->String('email');
            $table->String('numero1')->nullable($value = true);
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('contatos');
    }
};
