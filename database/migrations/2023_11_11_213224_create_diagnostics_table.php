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
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->string('direct_image')->nullable();
            $table->string('name_model')->nullable();
            $table->json('result_rhythms')->nullable();
            $table->json('accracy_model')->nullable();
            $table->json('conf_matriz')->nullable();
            $table->json('roc')->nullable();
            $table->json('loss_train_val')->nullable();
            $table->json('acc_train_val')->nullable();
            $table->json('boxplot_models')->nullable();
            $table->json('outras_metricas')->nullable();
            $table->json('preprocessing_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostics');
    }
};
