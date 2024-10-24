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
        Schema::create('logs_table_hw8', function (Blueprint $table) {
            $table->bigIncrements('id');
            // — time — время события;
            $table->dateTime('time');
            // — duration — длительность;
            $table->integer('duration');
            // — IP — IP-адрес зашедшего пользователя;
            $table->string('ip', 100)->nullable();
            // — url — адрес, который запросил пользователь;
            $table->string('url')->nullable();
            // — method — HTTP-метод (GET, POST);
            $table->string('method', 10)->nullable();
            // — input — передаваемые параметры.
            $table->string('input')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs_table_hw8');
    }
};
