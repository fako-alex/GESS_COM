<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\ReasonForDeparture;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function create(){

        $services = Service::all();
        $departures = ReasonForDeparture::all();
        $absences = Absence::all();
        return view('admin.users.create', compact('services','departures','absences'));
    }

    public function save(Request $request) {
        if (Auth::check()) {
            $userId = Auth::user()->id;  // Utiliser 'Auth::user()->id' pour récupérer l'ID de personnel authentifié
        } else {
            $userId = null;
        }
        // dd($request->all());
        // Affichage des données de la requête avant validation pour le débogage
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|max:100', //Nom personnel
            'first_name' => 'required|max:100', //Prénom personnel
            'gender' => 'nullable|in:Feminin,Masculin', //sexe
            'phone' => 'nullable|max:20', //N° de téléphone
            'email' => 'required|email|unique:users,email', //Adresse email
            'service_id' => 'required|exists:services,id', //Service
            'departure_id' => 'nullable|exists:reason_for_departures,id', //Motif de départ
            'matricule' => 'required|regex:/^[A-Z0-9]+$/|max:20', //Matricule
            'birth_date' => 'nullable|date', //Date de naissance
            'birth_place' => 'nullable|max:100', //Lieu de naissance
            'country' => 'required|max:100', //Pays
            'city' => 'required|max:100', //Ville
            'neighborhood' => 'required|max:100', //Quartier
            'hiring_date' => 'nullable|date', //Date d'emboche
            'departure_date' => 'nullable|date', //Date de départ
            'role' => 'required|in:Personnel,Admin', //Role
            'password' => 'nullable|min:8', // Mot de passe : minimum 8 caractères et doit être confirmé
            'status' => 'required|in:Actif,Inactif', //Status
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'added_by' => 'nullable|exists:users,id',

        ], [
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'phone.regex' => 'Le numéro de téléphone doit être au format +(241) 77-22-71-07.',
            'role.required' => 'Le rôle est obligatoire.',
            'service.required' => 'Le service est obligatoire.',
            'matricule.required' => 'Le matricule est obligatoire.',
            'matricule.regex' => 'Le matricule doit être au format QQAAABBVVCC12345ZDZ456',
            'role.in' => 'Le rôle sélectionné est invalide.',
            'country.required' => 'Le pays est obligatoire.',
            'city.required' => 'La ville est obligatoire.',
            'neighborhood.required' => 'Le quartier est obligatoire.',
            'status.required' => 'Le statut est obligatoire.',
        ]);

        // Crypter le mot de passe
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Ajouter l'ID du personnel authentifié
        $validatedData['added_by'] = $userId;

        // Vérifier si le dossier pour les personnels existe, sinon le créer
        if (!File::exists(public_path('documents/profil/users'))) {
            File::makeDirectory(public_path('documents/profil/users'), 0777, true);
        }
        // Si une image de profil est uploadée, on la déplace dans le dossier
        if ($request->hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $profile_picture_name = time(). '_'. $profile_picture->getClientOriginalName();
            // Déplace l'image vers le dossier public/documents/profil/users
            $profile_picture->move(public_path('documents/profil/users'), $profile_picture_name);
            $validatedData['profile_picture'] = $profile_picture_name;
        }

        try {
            // Créer un nouvel personnel
            $user = User::create($validatedData);

            // Succès
            Alert::success('Succès', 'Personnel ajouté avec succès !');
            return redirect()->route('admin.users.create'); // redirection vers la page de création
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Une erreur s\'est produite lors de l\'ajout: ' . $e->getMessage());
            return redirect()->back()->withInput(); // redirige avec les anciennes données pour réessayer
        }
    }

    public function list(){

        $users = User::latest('id')->get();
        return view('admin.users.list', compact('users'));
    }

    public function delete_users(Request $request, $id)
    {
        // dd("Route atteinte avec l'ID : " . $id);
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            Alert::success('Succès', 'Personnel supprimée avec succès !');
        } else {
            Alert::error('Erreur', 'Personnel non trouvée.');
        }

        return redirect()->route('admin.users.list');
    }

    public function edit_users(Request $request, $id){
        // dd($request->all());
        $user = User::findOrFail($id);
        $services = Service::all();
        $absences = Absence::all();
        $departures = ReasonForDeparture::all();

        return view('admin.users.update',compact('user', 'services', 'departures', 'absences'));
    }

    public function update_users(Request $request, $id)
    {
        // dd($request->all());
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'first_name' => 'required|max:100',
                'gender' => 'nullable|in:Feminin,Masculin',
                'phone' => 'nullable|max:20',
                'email' => 'required|email|unique:users,email,' . $id,
                'service' => 'required|exists:services,id', //Service
                'departure_id' => 'nullable|exists:services,id', //Depart
                'absence_id' => 'nullable|exists:absences,id', //Absence
                'matricule' => 'required|regex:/^[A-Z0-9]+$/|max:20',
                'birth_date' => 'nullable|date',
                'birth_place' => 'nullable|max:100',
                'country' => 'required|max:100',
                'city' => 'required|max:100',
                'neighborhood' => 'required|max:100',
                'hiring_date' => 'nullable|date',
                'departure_date' => 'nullable|date',
                'role' => 'required|in:Personnel,Admin',
                'password' => 'nullable|min:8',
                'status' => 'required|in:Actif,Inactif',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'added_by' => 'nullable|exists:users,id',
            ],
            [
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'phone.regex' => 'Le numéro de téléphone doit être au format +(241) 77-22-71-07.',
                'role.required' => 'Le rôle est obligatoire.',
                'service.required' => 'Le service est obligatoire.',
                'matricule.required' => 'Le matricule est obligatoire.',
                'matricule.regex' => 'Le matricule doit être au format QQAAABBVVCC12345ZDZ456',
                'role.in' => 'Le rôle sélectionné est invalide.',
                'country.required' => 'Le pays est obligatoire.',
                'city.required' => 'La ville est obligatoire.',
                'neighborhood.required' => 'Le quartier est obligatoire.',
                'status.required' => 'Le statut est obligatoire.',

                ]
            );
            //dd($request->all());
            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password); // Hasher le mot de passe
            } else {
                unset($validatedData['password']); // Retirer le mot de passe si non fourni
            }

            // Vérification et création des dossiers si inexistants
            if (!File::exists(public_path('documents/profil/users'))) {
                File::makeDirectory(public_path('documents/profil/users'), 0777, true);
            }

            // Gestion de l'image de couverture
            if ($request->hasFile('profile_picture')) {
                // Supprime l'ancienne image si existante
                if (!empty($user->profile_picture) && File::exists(public_path('documents/profil/users/' . $user->profile_picture))) {
                    File::delete(public_path('documents/profil/users/' . $user->profile_picture));
                }

                // Sauvegarde de la nouvelle image
                $profile_picture = $request->file('profile_picture');
                $profile_picture_name = time() . '_' . $profile_picture->getClientOriginalName();
                $profile_picture->move(public_path('documents/profil/users'), $profile_picture_name);
                $validatedData['profile_picture'] = $profile_picture_name;
            }

            if (isset($validatedData['service'])) {
                $validatedData['service_id'] = $validatedData['service'];
                unset($validatedData['service']);
            }

            if (isset($validatedData['absence'])) {
                $validatedData['absence_id'] = $validatedData['absence'];
                unset($validatedData['absence']);
            }

            if (isset($validatedData['departure'])) {
                $validatedData['departure_id'] = $validatedData['departure'];
                unset($validatedData['departure']);
            }

            // Mise à jour des champs du personnel
            $user->update($validatedData);

            // Succès
            Alert::success('Succès', 'Personnel mis à jour avec succès !');
            // dd($request->all());
            return redirect()->route('admin.users.list');

        } catch (\Exception $e) {
            // Gestion des erreurs
            $errors = $e->getMessage();
            Alert::error('Erreur', 'Une erreur s\'est produite lors de la mise à jour: ' . $errors);
            return redirect()->back();
        }
    }

    public function update_users_p(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'first_name' => 'required|max:100',
                'phone' => 'required|max:20',
                'email' => 'required|email|unique:users,email,' . $id,
                'birth_date' => 'required|date',
                'birth_place' => 'required|max:100',
                'country' => 'required|max:100',
                'city' => 'required|max:100',
                'neighborhood' => 'required|max:100',
                'hiring_date' => 'required|date',
                'password' => 'required|min:8',
                'status' => 'required|in:Actif,Inactif',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'added_by' => 'nullable|exists:users,id',
            ],
            [
                'name.required' => 'Le Nom est obligatoire.',
                'first_name.required' => 'Le prénom est obligatoire.',
                'phone.required' => 'Le N° de téléphone est obligatoire.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'phone.regex' => 'Le numéro de téléphone doit être au format +(241) 77-22-71-07.',
                'birth_date.required' => 'La Date de naissance est obligatoire.',
                'birth_place.required' => 'Le Lieu de naissance est obligatoire.',
                'country.required' => 'Le Pays est obligatoire.',
                'city.required' => 'La Ville est obligatoire.',
                'neighborhood.required' => 'Le Quartier est obligatoire.',
                'password.required' => 'Le Mot de passe est obligatoire.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
                ]
            );

            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password); // Hasher le mot de passe
            } else {
                unset($validatedData['password']); // Retirer le mot de passe si non fourni
            }

            // Vérification et création des dossiers si inexistants
            if (!File::exists(public_path('documents/profil/users'))) {
                File::makeDirectory(public_path('documents/profil/users'), 0777, true);
            }

            // Gestion de l'image de couverture
            if ($request->hasFile('profile_picture')) {
                // Supprime l'ancienne image si existante
                if (!empty($user->profile_picture) && File::exists(public_path('documents/profil/users/' . $user->profile_picture))) {
                    File::delete(public_path('documents/profil/users/' . $user->profile_picture));
                }

                // Sauvegarde de la nouvelle image
                $profile_picture = $request->file('profile_picture');
                $profile_picture_name = time() . '_' . $profile_picture->getClientOriginalName();
                $profile_picture->move(public_path('documents/profil/users'), $profile_picture_name);
                $validatedData['profile_picture'] = $profile_picture_name;
            }

            // Mise à jour des infos du personnel
            $user->update($validatedData);

            // Succès
            Alert::success('Succès', 'Personnel mis à jour avec succès !');
            // dd($request->all());
            return redirect()->back();

        } catch (\Exception $e) {
            // Gestion des erreurs
            $errors = $e->getMessage();
            Alert::error('Erreur', 'Une erreur s\'est produite lors de la mise à jour: ' . $errors);
            return redirect()->back();
        }
    }

    public function profil()
    {
        $user = Auth::user();  // Récupère l'utilisateur connecté
        $services = Service::all();//Services disponibles
        return view('admin.users.profil', compact('user','services'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $users = \App\Models\User::where('name', 'LIKE', "%{$query}%")
                                 ->orWhere('first_name', 'LIKE', "%{$query}%")
                                 ->limit(10)
                                 ->get(['id', 'name', 'first_name']);

        return response()->json($users);
    }

    // public function getUsersByService($serviceId)
    // {
    //     $users = \App\Models\User::where('service_id', $serviceId)->get();
    //     return response()->json($users);
    // }
    public function getUsersByService($serviceId)
    {
        $users = User::where('service_id', $serviceId)
            ->where('status', 'Actif')
            ->whereNull('departure_date')
            ->whereNull('departure_id')
            ->whereNull('absence_id')
            ->get();

        return response()->json($users);
    }



}