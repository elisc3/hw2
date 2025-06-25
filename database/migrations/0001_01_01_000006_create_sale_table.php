<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('link');
            $table->text('descrizione');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sale');
    }
};