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
        Schema::create('chats', function (Blueprint $table) {     
            $table->comment('Чаты');       
            $table->id()->comment('Номер');
            $table->unsignedBigInteger('owner_id')->comment('Владелец');
            $table->unsignedBigInteger('initiator_id')->comment('Инициатор');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('initiator_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['owner_id', 'initiator_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
