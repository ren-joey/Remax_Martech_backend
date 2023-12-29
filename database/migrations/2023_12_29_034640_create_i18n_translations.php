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
        Schema::create('i18n_translations', function (Blueprint $table) {
            $table->id();
            $table->string('i18n_key');
            $table->foreign('i18n_key')->references('key')->on('i18n')->onDelete('cascade');
            $table->string('locale', 18);
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i18n_translations');
    }
};
