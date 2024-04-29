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
        Schema::create('conversation', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('get_id');
            $table->unsignedBigInteger('messages_id');
            
            $table->foreign('post_id')->references('id')->on('user');
            $table->foreign('get_id')->references('id')->on('user');
            $table->foreign('messages_id')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation');
    }
};
