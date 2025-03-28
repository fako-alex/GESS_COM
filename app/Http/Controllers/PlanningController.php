<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PlanningController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $services = Service::all();
        $services = \App\Models\Service::withCount('users')->get();//pour compter le nombre de users par service
        $users = User::all();
        return view('admin.planning.create', compact('services', 'users'));
    }

    /**
     * save a newly created resource in storage.
     */
    public function save(Request $request)
    {
        $userId = Auth::id(); // Récupération de l'ID de l'utilisateur authentifié

        // dd($request->all());
        $validatedData = $request->validate([
            'name_model_planning' => 'required|string', // Nom du planning
            'type_model_planning' => 'required|string', // Type de planning
            'duree_calculer_model_planning' => 'required|date_format:H:i', // Durée calculée du planning
            'status' => 'required|in:Actif,Inactif', // Statut du planning
            'heure_arriver_un_model_planning' => 'required|date_format:H:i', // Heure d'arrivée 1
            'heure_depart_un_model_planning' => 'required|date_format:H:i', // Heure de départ 1
            'av_dep_un' => 'nullable|string', // Avantage entrée 1
            'ap_dep_un' => 'nullable|string', // Après sortie 1
            'debut_ap_un' => 'nullable|date_format:H:i', // Début période après sortie 1
            'fin_ap_un' => 'nullable|date_format:H:i', // Fin période après sortie 1
            'heure_arriver_deux_model_planning' => 'nullable|date_format:H:i', // Heure d'arrivée 2
            'heure_depart_deux_model_planning' => 'nullable|date_format:H:i', // Heure de départ 2
            'av_dep_deux' => 'nullable|string', // Avantage entrée 2
            'ap_dep_deux' => 'nullable|string', // Après sortie 2
            'fin_ap_deux' => 'nullable|date_format:H:i', // Fin période après sortie 2
            'debut_ap_deux' => 'nullable|date_format:H:i', // Début période après sortie 2
        ], [
            'name_model_planning.required' => 'Le champ Nom est obligatoire.',
            'type_model_planning.required' => 'Le Type de planning est obligatoire.',
            'status.required' => 'Le statut est obligatoire.',
            'duree_calculer_model_planning.required' => 'Le champ Durée calculée est obligatoire.',
            'heure_arriver_un_model_planning.required' => 'Le champ Heure d\'entrée 1 est obligatoire.',
            'heure_depart_un_model_planning.required' => 'Le champ Heure de sortie 1 est obligatoire.',
        ]);

        try {
            // Création du planning
            Planning::create([
                'name_model_planning' => $validatedData['name_model_planning'],
                'type_model_planning' => $validatedData['type_model_planning'],
                'duree_calculer_model_planning' => $validatedData['duree_calculer_model_planning'],
                'status' => $validatedData['status'],
                'heure_arriver_un_model_planning' => $validatedData['heure_arriver_un_model_planning'],
                'heure_depart_un_model_planning' => $validatedData['heure_depart_un_model_planning'],
                'av_dep_un' => $validatedData['av_dep_un'] ?? null,
                'ap_dep_un' => $validatedData['ap_dep_un'] ?? null,
                'debut_ap_un' => $validatedData['debut_ap_un'] ?? null,
                'fin_ap_un' => $validatedData['fin_ap_un'] ?? null,
                'heure_arriver_deux_model_planning' => $validatedData['heure_arriver_deux_model_planning'] ?? null,
                'heure_depart_deux_model_planning' => $validatedData['heure_depart_deux_model_planning'] ?? null,
                'av_dep_deux' => $validatedData['av_dep_deux'] ?? null,
                'ap_dep_deux' => $validatedData['ap_dep_deux'] ?? null,
                'fin_ap_deux' => $validatedData['fin_ap_deux'] ?? null,
                'debut_ap_deux' => $validatedData['debut_ap_deux'] ?? null,
                'created_by' => $userId,
            ]);

            // Message de succès
            Alert::success('Succès', 'Planning créé avec succès !');
            return redirect()->route('admin.planning.create');

        } catch (\Illuminate\Database\QueryException $e) {
            // Erreur SQL (exemple : problème d'intégrité des données)
            Alert::error('Erreur', 'Problème avec la base de données : ' . $e->getMessage());
            return redirect()->back()->withInput();

        } catch (\Exception $e) {
            // Toute autre erreur
            Alert::error('Erreur', 'Une erreur est survenue : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }



    /**
     * Display the specified resource.
     */
    public function list(){
        $users = User::latest('id')->get();
        $plannings = Planning::latest('id')->get();
        return view('admin.planning.list', compact('users', 'plannings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_planning($id)
    {
        // Récupération du planning à modifier
        $planning = Planning::find($id);

        // Si le planning n'existe pas, rediriger avec un message d'erreur
        if (!$planning) {
            Alert::error('Erreur', 'Le planning spécifié n\'existe pas.');
            return redirect()->route('admin.planning.list');
        }
        // Passer les données à la vue en utilisant compact()
        return view('admin.planning.update', compact('planning'));
    }



    public function update_planning(Request $request, $id)
    {
        $userId = Auth::id(); // ID de l'utilisateur authentifié

        // Récupération du planning à modifier
        $planning = Planning::findOrFail($id);

        // Validation des données
        $request->merge([
            'duree_calculer_model_planning' => trim($request->input('duree_calculer_model_planning'))
        ]);
        $validatedData = $request->validate([
            'name_model_planning' => 'required|string',
            'type_model_planning' => 'required|string',
            'duree_calculer_model_planning' => 'required|date_format:H:i',
            'status' => 'required|in:Actif,Inactif',
            'heure_arriver_un_model_planning' => 'required|date_format:H:i',
            'heure_depart_un_model_planning' => 'required|date_format:H:i',
            'av_dep_un' => 'nullable|string',
            'ap_dep_un' => 'nullable|string',
            'debut_ap_un' => 'nullable|date_format:H:i',
            'fin_ap_un' => 'nullable|date_format:H:i',
            'heure_arriver_deux_model_planning' => 'nullable|date_format:H:i',
            'heure_depart_deux_model_planning' => 'nullable|date_format:H:i',
            'av_dep_deux' => 'nullable|string',
            'ap_dep_deux' => 'nullable|string',
            'fin_ap_deux' => 'nullable|date_format:H:i',
            'debut_ap_deux' => 'nullable|date_format:H:i',
        ], [
            'name_model_planning.required' => 'Le champ Nom est obligatoire.',
            'type_model_planning.required' => 'Le Type de planning est obligatoire.',
            'status.required' => 'Le statut est obligatoire.',
            'duree_calculer_model_planning.required' => 'Le champ Durée calculée est obligatoire.',
            'heure_arriver_un_model_planning.required' => 'Le champ Heure d\'entrée 1 est obligatoire.',
            'heure_depart_un_model_planning.required' => 'Le champ Heure de sortie 1 est obligatoire.',
        ]);
        // dd($request->all());
        try {
            // Mise à jour des données
            $planning->update([
                'name_model_planning' => $validatedData['name_model_planning'],
                'type_model_planning' => $validatedData['type_model_planning'],
                'duree_calculer_model_planning' => $validatedData['duree_calculer_model_planning'],
                'status' => $validatedData['status'],
                'heure_arriver_un_model_planning' => $validatedData['heure_arriver_un_model_planning'],
                'heure_depart_un_model_planning' => $validatedData['heure_depart_un_model_planning'],
                'av_dep_un' => $validatedData['av_dep_un'] ?? null,
                'ap_dep_un' => $validatedData['ap_dep_un'] ?? null,
                'debut_ap_un' => $validatedData['debut_ap_un'] ?? null,
                'fin_ap_un' => $validatedData['fin_ap_un'] ?? null,
                'heure_arriver_deux_model_planning' => $validatedData['heure_arriver_deux_model_planning'] ?? null,
                'heure_depart_deux_model_planning' => $validatedData['heure_depart_deux_model_planning'] ?? null,
                'av_dep_deux' => $validatedData['av_dep_deux'] ?? null,
                'ap_dep_deux' => $validatedData['ap_dep_deux'] ?? null,
                'fin_ap_deux' => $validatedData['fin_ap_deux'] ?? null,
                'debut_ap_deux' => $validatedData['debut_ap_deux'] ?? null,
                'updated_by' => $userId, // Enregistre l'utilisateur ayant modifié le planning
            ]);

            // Message de succès
            Alert::success('Succès', 'Planning mis à jour avec succès !');
            return redirect()->route('admin.planning.list', $id);

        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Erreur', 'Problème avec la base de données : ' . $e->getMessage());
            return redirect()->back()->withInput();

        } catch (\Exception $e) {
            Alert::error('Erreur', 'Une erreur est survenue : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * delete_planning the specified resource from storage.
     */
    public function delete_planning(Request $request, $id)
    {
        $planning = Planning::findOrFail($id);

        if ($planning) {
            $planning->delete();
            Alert::success('Succès', 'Planning supprimée avec succès !');
        } else {
            Alert::error('Erreur', 'Planning non trouvée.');
        }

        return redirect()->route('admin.planning.list');
    }
}
