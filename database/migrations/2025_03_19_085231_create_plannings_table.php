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
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Lien avec la table des services
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lien avec la table des utilisateurs
            $table->string('planning_type'); // Type de planification (jour, semaine, mois, année)
            $table->date('start_date'); // Date de début
            $table->integer('start_time')->nullable(); // Heure de début
            $table->date('end_date')->nullable(); // Date de fin
            $table->integer('end_time')->nullable(); // Heure de fin
            $table->string('event_location')->nullable(); // Lieu de l'événement
            $table->enum('status', ['en_attente', 'confirme', 'annule']); // Statut de l'événement
            $table->string('detail_planning')->nullable(); // Détails supplémentaires
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Lien avec l'utilisateur créateur du planning
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
