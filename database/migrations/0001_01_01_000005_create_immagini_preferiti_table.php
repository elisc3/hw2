<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('immagini_preferiti', function (Blueprint $table) {
           
            $table->unsignedBigInteger('user_id');
            $table->string('id_img'); // ID dell'immagine di Pexels
            $table->text('link'); // URL dell'immagine
            $table->timestamps();
            
            // Indici e vincoli
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'id_img']); // Un utente non può avere la stessa immagine duplicata
        });
    }

    public function down()
    {
        Schema::dropIfExists('immagini_preferiti');
    }
};