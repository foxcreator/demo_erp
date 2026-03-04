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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('counterparty_id')->constrained('counterparties')->cascadeOnDelete();
            $table->string('type')->nullable()->comment('Вид договору');
            $table->string('number')->nullable()->comment('Номер договору');
            $table->date('date')->nullable()->comment('Дата укладання');
            $table->string('name')->comment('Найменування');
            $table->string('currency')->nullable()->comment('Валюта');
            $table->date('valid_until')->nullable()->comment('Термін дії/діє до');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
