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
        Schema::create('plannings', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée

            $table->string('name_model_planning'); // Nom du planning
            $table->string('type_model_planning'); // Type de planning
            $table->time('duree_calculer_model_planning'); // Durée calculée du planning
            $table->enum('status', ['Actif', 'Inactif']); // Statut du planning

            // Première plage horaire
            $table->time('heure_arriver_un_model_planning'); // Heure d'arrivée 1
            $table->time('heure_depart_un_model_planning'); // Heure de départ 1
            $table->string('av_dep_un')->nullable(); // Avantage entrée 1 (ex : pause, prime, etc.)
            $table->string('ap_dep_un')->nullable(); // Après sortie 1
            $table->time('debut_ap_un')->nullable(); // Début période après sortie 1
            $table->time('fin_ap_un')->nullable(); // Fin période après sortie 1

            // Deuxième plage horaire (optionnelle)
            $table->time('heure_arriver_deux_model_planning')->nullable(); // Heure d'arrivée 2
            $table->time('heure_depart_deux_model_planning')->nullable(); // Heure de départ 2
            $table->string('av_dep_deux')->nullable(); // Avantage entrée 2
            $table->string('ap_dep_deux')->nullable(); // Après sortie 2
            $table->time('debut_ap_deux')->nullable(); // Début période après sortie 2
            $table->time('fin_ap_deux')->nullable(); // Fin période après sortie 2

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Clé étrangère vers users
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plannings');
    }
};