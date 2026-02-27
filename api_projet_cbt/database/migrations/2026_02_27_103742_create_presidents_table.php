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
        Schema::create('presidents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->longText('message'); //Le type longtext peux stocker jusqu'à 4Go 
            $table->string('url_image'); //url de l'image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presidents');
    }
};
