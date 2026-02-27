<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // On fixe la taille par défaut à 191 pour éviter l'erreur d'index MySQL
        // Laravel utilise l'encodage utf8mb4 (4 octets par caractère).Si on fait $191 \times 4$, on obtient 764 octets.C'est le chiffre maximum possible qui reste en dessous de la limite de 767
        Schema::defaultStringLength(191); //Pour éviter d'écrire $table->string('...', 191); partout dans les migrations
    }
}
