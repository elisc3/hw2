<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->text('content');
            $table->timestamps('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};