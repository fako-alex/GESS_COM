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
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // ID personnel
            $table->string('name');  // Nom personnel
            $table->string('first_name')->nullable();  // Prénom personnel
            $table->enum('gender', ['Feminin', 'Masculin'])->nullable();  // Sexe
            $table->string('phone')->nullable();  // N° de téléphone
            $table->string('email')->unique();  // Email unique
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('departure_id')->constrained()->onDelete('cascade');
            $table->string('matricule')->nullable();  // Matricule
            $table->timestamp('email_verified_at')->nullable();  // Date de vérification de l'email
            $table->string('birth_place')->nullable();  // Lieu de naissance
            $table->date('birth_date')->nullable();  // Date de naissance
            $table->string('country')->default('Gabon');  // Pays
            $table->string('city')->default('Libreville');  // Ville
            $table->string('neighborhood')->nullable();  // Quartier
            $table->date('hiring_date')->nullable();  // Date d'embauche
            $table->date('departure_date')->nullable();  // Date de départ
            $table->enum('role', ['Personnel', 'Admin'])->default('Personnel');  // Rôle
            $table->enum('status', ['Actif', 'Inactif'])->default('Actif');  // Statut
            $table->string('profile_picture')->nullable();  // Photo de profil
            $table->foreignId('added_by')->nullable()->constrained('users');  // personnel ayant ajouté ce profil (clé étrangère)
            $table->string('password')->nullable();  // Mot de passe
            $table->rememberToken();  // Token de session
            $table->timestamps();  // Date de création et mise à jour
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
