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
        Schema::create('users', function (Blueprint $table) {
            $table->comment('Пользователи');
            $table->id()->comment('Номер');
            $table->string('name')->comment('Наименование');
            $table->string('email')->unique()->comment('Почта');
            $table->boolean('is_admin')->default(false)->comment('Администратор');
            $table->timestamp('email_verified_at')->nullable()->comment('Дата верификации');
            $table->string('password')->comment('Пароль');
            
            $table->integer('balance')->default(0)->comment('Баланс');
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
