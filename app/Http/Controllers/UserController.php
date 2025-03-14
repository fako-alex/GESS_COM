<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('admin.users.create');
    }

    // public function save(Request $request) {
    //     if (Auth::check()) {
    //         $userId = Auth::user()->id;  // Utiliser 'Auth::user()->id' pour récupérer l'ID de l'utilisateur authentifié
    //     } else {
    //         $userId = null;
    //     }

    //     // Affichage des données de la requête avant validation pour le débogage

    //     // Validation des données
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:100', //Nom utilisateur
    //         'first_name' => 'required|max:100', //Prénom utilisateur
    //         'gender' => 'nullable|in:Feminin,Masculin', //sexe
    //         'email' => 'required|email|unique:user_t_s,email', //Adresse email
    //         'phone' => 'nullable|max:20', //N° de téléphone
    //         'birth_date' => 'nullable|date', //Date de naissance
    //         'birth_place' => 'nullable|max:100', //Lieu de naissance
    //         'password' => 'required|min:8', // Mot de passe : minimum 8 caractères et doit être confirmé
    //         'address' => 'nullable|max:255', //Adresse de résidence
    //         'role' => 'required|in:Élève,Professeur,Bibliothécaire,Administrateur', //Role
    //         'class_level' => 'nullable|required_if:role,Élève|max:100', //Niveau
    //         'department' => 'nullable|required_if:role,Professeur|max:100', //Département
    //         'registration_date' => 'nullable|date', //Date de creation
    //         'status' => 'required|in:Actif,Inactif', //Status
    //         'current_loans' => 'nullable|integer|min:0', //
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'added_by' => 'nullable|exists:users,id',
    //     ], [
    //         'email.unique' => 'Cette adresse email est déjà utilisée.',
    //         'phone.regex' => 'Le numéro de téléphone doit être au format +(241) 77-22-71-07.',
    //         'role.required' => 'Le rôle est obligatoire.',
    //         'password.required' => 'Le mot de passe est obligatoire et doit être supérieur à 8 caractères.',
    //         'role.in' => 'Le rôle sélectionné est invalide.',
    //         'class_level.required_if' => 'Le champ Classe/Niveau est obligatoire pour un Élève.',
    //         'department.requ' => 'Le champ Département est obligatoire pour un Professeur ou Bibliothécaire.',
    //     ]);

    //     // dd($request->all());
    //     // Crypter le mot de passe
    //     $validatedData['password'] = bcrypt($validatedData['password']);

    //     // Ajouter l'ID de l'utilisateur authentifié
    //     $validatedData['added_by'] = $userId;

    //     // Vérifier si le dossier pour les utilisateurs existe, sinon le créer
    //     if (!File::exists(public_path('documents/users'))) {
    //         File::makeDirectory(public_path('documents/users'), 0777, true);
    //     }
    //     // Si une image de profil est uploadée, on la déplace dans le dossier
    //     if ($request->hasFile('profile_picture')) {
    //         $profile_picture = $request->file('profile_picture');
    //         $profile_picture_name = time(). '_'. $profile_picture->getClientOriginalName();
    //         // Déplace l'image vers le dossier public/documents/users
    //         $profile_picture->move(public_path('documents/users'), $profile_picture_name);
    //         $validatedData['profile_picture'] = $profile_picture_name;
    //     }

    //     $validatedData['password'] = bcrypt($validatedData['password']);
    //     $validatedData['added_by'] = $userId;

    //     try {
    //         // Créer un nouvel utilisateur
    //         $user = UserT::create($validatedData);

    //         // Succès
    //         Alert::success('Succès', 'Utilisateur ajouté avec succès !');
    //         return redirect()->route('admin.users/create'); // redirection vers la page de création
    //     } catch (\Exception $e) {
    //         Alert::error('Erreur', 'Une erreur s\'est produite lors de l\'ajout: ' . $e->getMessage());
    //         return redirect()->back()->withInput(); // redirige avec les anciennes données pour réessayer
    //     }
    // }

    // public function list(){

    //     $users = UserT::latest('id')->get();
    //     return view('admin.users/list', compact('users'));
    //     // return view('admin.users/list');
    // }

    // public function delete_users(Request $request, $id)
    // {
    //     $user = UserT::findOrFail($id);

    //     if ($user) {
    //         $user->delete();
    //         Alert::success('Succès', 'Utilisateur supprimée avec succès !');
    //     } else {
    //         Alert::error('Erreur', 'Utilisateur non trouvée.');
    //     }

    //     return redirect()->route('admin.users/list');
    // }

    // public function edit_users(Request $request, $id){
    //     // dd($request->all());
    //     $user = UserT::findOrFail($id);
    //     return view('admin.users.update',compact('user'));
    // }

    // public function update_users(Request $request, $id)
    // {
    //     try {
    //         $user = UserT::findOrFail($id);

    //         $validatedData = $request->validate([
    //             'name' => 'required|max:100', //Nom utilisateur
    //             'first_name' => 'required|max:100', //Prénom utilisateur
    //             'gender' => 'nullable|in:Feminin,Masculin', //sexe
    //             'email' => 'required|email|unique:user_t_s,email,' . $user->id, // Exception pour l'ID de l'utilisateur actuel
    //             'phone' => 'nullable|max:20', //N° de téléphone
    //             'birth_date' => 'nullable|date', //Date de naissance
    //             'birth_place' => 'nullable|max:100', //Lieu de naissance
    //             'password' => 'nullable|min:8', // Mot de passe : minimum 8 caractères et doit être confirmé
    //             'address' => 'nullable|max:255', //Adresse de résidence
    //             'role' => 'required|in:Élève,Professeur,Bibliothécaire,Administrateur', //Role
    //             'class_level' => 'nullable|required_if:role,Élève|max:100', //Niveau
    //             'department' => 'nullable|required_if:role,Professeur,Bibliothécaire|max:100', //Département
    //             'registration_date' => 'nullable|date', //Date de creation
    //             'status' => 'required|in:Actif,Inactif', //Status
    //             'current_loans' => 'nullable|integer|min:0', //
    //             'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'added_by' => 'nullable|exists:users,id',
    //         ],
    //         [
    //             'email.unique' => 'Cette adresse email est déjà utilisée.',
    //             'phone.regex' => 'Le numéro de téléphone doit être au format +(241) 77-22-71-07.',
    //             'role.required' => 'Le rôle est obligatoire.',
    //             'role.in' => 'Le rôle sélectionné est invalide.',
    //             'class_level.required_if' => 'Le champ Classe/Niveau est obligatoire pour un Élève.',
    //             'department.required_if' => 'Le champ Département est obligatoire pour un Professeur ou Bibliothécaire.',
    //             ]
    //         );

    //         if ($request->filled('password')) {
    //             $validatedData['password'] = bcrypt($request->password); // Hasher le mot de passe
    //         } else {
    //             unset($validatedData['password']); // Retirer le mot de passe si non fourni
    //         }

    //         // Vérification et création des dossiers si inexistants
    //         if (!File::exists(public_path('documents/users'))) {
    //             File::makeDirectory(public_path('documents/users'), 0777, true);
    //         }

    //         // Gestion de l'image de couverture
    //         if ($request->hasFile('profile_picture')) {
    //             // Supprime l'ancienne image si existante
    //             if (!empty($user->profile_picture) && File::exists(public_path('documents/users/' . $user->profile_picture))) {
    //                 File::delete(public_path('documents/users/' . $user->profile_picture));
    //             }

    //             // Sauvegarde de la nouvelle image
    //             $profile_picture = $request->file('profile_picture');
    //             $profile_picture_name = time() . '_' . $profile_picture->getClientOriginalName();
    //             $profile_picture->move(public_path('documents/users'), $profile_picture_name);
    //             $validatedData['profile_picture'] = $profile_picture_name;
    //         }

    //         // Mise à jour des champs du livre
    //         $user->update($validatedData);

    //         // Succès
    //         Alert::success('Succès', 'Utilisateur mis à jour avec succès !');
    //         // dd($request->all());
    //         return redirect()->route('admin.users/list');

    //     } catch (\Exception $e) {
    //         // Gestion des erreurs
    //         $errors = $e->getMessage();
    //         Alert::error('Erreur', 'Une erreur s\'est produite lors de la mise à jour: ' . $errors);
    //         return redirect()->back();
    //     }
    // }
    // public function update_users_p(Request $request, $id)
    // {
    //     try {
    //         $user = UserT::findOrFail($id);

    //         $validatedData = $request->validate([
    //             'name' => 'required|max:100', //Nom utilisateur
    //             'first_name' => 'required|max:100', //Prénom utilisateur
    //             'gender' => 'nullable|in:Feminin,Masculin', //sexe
    //             'email' => 'required|email|unique:user_t_s,email,' . $user->id, // Exception pour l'ID de l'utilisateur actuel
    //             'phone' => 'nullable|max:20', //N° de téléphone
    //             'birth_date' => 'nullable|date', //Date de naissance
    //             'birth_place' => 'nullable|max:100', //Lieu de naissance
    //             'password' => 'nullable|min:8', // Mot de passe : minimum 8 caractères et doit être confirmé
    //             'address' => 'nullable|max:255', //Adresse de résidence
    //             'role' => 'required|in:Élève,Professeur,Bibliothécaire,Administrateur', //Role
    //             'class_level' => 'nullable|required_if:role,Élève|max:100', //Niveau
    //             'department' => 'nullable|required_if:role,Professeur,Bibliothécaire|max:100', //Département
    //             'registration_date' => 'nullable|date', //Date de creation
    //             'status' => 'required|in:Actif,Inactif', //Status
    //             'current_loans' => 'nullable|integer|min:0', //
    //             'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'added_by' => 'nullable|exists:users,id',
    //         ],
    //         [
    //             'email.unique' => 'Cette adresse email est déjà utilisée.',
    //             'phone.regex' => 'Le numéro de téléphone doit être au format +(241) 77-22-71-07.',
    //             'role.required' => 'Le rôle est obligatoire.',
    //             'role.in' => 'Le rôle sélectionné est invalide.',
    //             'class_level.required_if' => 'Le champ Classe/Niveau est obligatoire pour un Élève.',
    //             'department.required_if' => 'Le champ Département est obligatoire pour un Professeur ou Bibliothécaire.',
    //             ]
    //         );

    //         if ($request->filled('password')) {
    //             $validatedData['password'] = bcrypt($request->password); // Hasher le mot de passe
    //         } else {
    //             unset($validatedData['password']); // Retirer le mot de passe si non fourni
    //         }

    //         // Vérification et création des dossiers si inexistants
    //         if (!File::exists(public_path('documents/users'))) {
    //             File::makeDirectory(public_path('documents/users'), 0777, true);
    //         }

    //         // Gestion de l'image de couverture
    //         if ($request->hasFile('profile_picture')) {
    //             // Supprime l'ancienne image si existante
    //             if (!empty($user->profile_picture) && File::exists(public_path('documents/users/' . $user->profile_picture))) {
    //                 File::delete(public_path('documents/users/' . $user->profile_picture));
    //             }

    //             // Sauvegarde de la nouvelle image
    //             $profile_picture = $request->file('profile_picture');
    //             $profile_picture_name = time() . '_' . $profile_picture->getClientOriginalName();
    //             $profile_picture->move(public_path('documents/users'), $profile_picture_name);
    //             $validatedData['profile_picture'] = $profile_picture_name;
    //         }

    //         // Mise à jour des champs du livre
    //         $user->update($validatedData);

    //         // Succès
    //         Alert::success('Succès', 'Utilisateur mis à jour avec succès !');
    //         // dd($request->all());
    //         return redirect()->back();

    //     } catch (\Exception $e) {
    //         // Gestion des erreurs
    //         $errors = $e->getMessage();
    //         Alert::error('Erreur', 'Une erreur s\'est produite lors de la mise à jour: ' . $errors);
    //         return redirect()->back();
    //     }
    // }

    // public function profil() {
    //     $users = UserT::latest('id')->get();
    //     $user = Auth::user(); // Récupère l'utilisateur connecté
    //     return view('admin.users/profil', compact('users', 'user'));
    // }
}
