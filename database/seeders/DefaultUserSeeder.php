<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'adminalex@gmail.com'],
            [
                'name' => 'alex', // Nom du personnel
                'first_name' => 'ADMIN ADMIN', // Prénom du personnel
                'email' => 'adminalex@gmail.com', // Email du personnel
                'service' => '1', // Service du personnel
                'password' => Hash::make('Cisco1234@'), // Mot de passe du personnel
                'role' => 'Admin', // Rôle : Admin
                'status' => 'Actif', // Statut : Actif
                'profile_picture' => null, // Photo de profil, ici elle est vide
                'added_by' => null, // Personnel qui a ajouté cet personnel, peut être null
                'gender' => 'Masculin', // Sexe : Masculin
                'phone' => '0123456789', // Numéro de téléphone
                'birth_date' => '1985-05-20', // Date de naissance
                'birth_place' => 'Libreville', // Lieu de naissance
                'country' => 'Gabon', // Pays
                'city' => 'Libreville', // Ville
                'neighborhood' => 'Akanda', // Quartier
                'hiring_date' => '2020-01-01', // Date d'embauche
                'departure_date' => null, // Date de départ (null car il est toujours actif)
            ]
        );
    }
}
