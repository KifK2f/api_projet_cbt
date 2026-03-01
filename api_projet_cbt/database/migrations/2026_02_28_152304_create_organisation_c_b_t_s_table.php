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
        Schema::create('organisation_c_b_t_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('phone');
            $table->enum('type', ['gold', 'blue'])->default('blue'); // Pour style cadre
            $table->enum('category', ['executif','departement','zone']); // Pour séparer les sections
            $table->boolean('is_main')->default(false); // Pour mettre en avant le président
            $table->integer('position'); //Attribut pour bien placer les gens comme sur le calendrier et ne pas mélanger les positions
            $table->string('url_image'); //url de l'image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisation_c_b_t_s');
    }
};
