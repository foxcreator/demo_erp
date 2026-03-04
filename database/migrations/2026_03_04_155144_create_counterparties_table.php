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
        Schema::create('counterparties', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable()->comment('Вид контрагента');
            $table->string('name')->comment('Найменування');
            $table->string('full_name')->nullable()->comment('Повне найменування');
            $table->string('inn')->nullable()->comment('ІНН');
            $table->string('kpp')->nullable()->comment('КПП/ЄДРПОУ');
            $table->text('legal_address')->nullable()->comment('Юридична адреса');
            $table->text('actual_address')->nullable()->comment('Фактична адреса');
            $table->string('phone')->nullable()->comment('Телефон');
            $table->string('email')->nullable()->comment('Email');
            $table->string('bank_account')->nullable()->comment('Основний банківський рахунок');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counterparties');
    }
};
