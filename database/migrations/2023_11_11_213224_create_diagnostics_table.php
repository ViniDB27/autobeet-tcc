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
            $table->string('file');
            $table->string('direct_image');
            $table->string('name_model');
            $table->json('result_rhythms');
            $table->json('accracy_model');
            $table->json('conf_matriz');
            $table->json('roc');
            $table->json('loss_train_val');
            $table->json('acc_train_val');
            $table->json('boxplot_models');
            $table->json('outras_metricas');
            $table->json('preprocessing_data');
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
