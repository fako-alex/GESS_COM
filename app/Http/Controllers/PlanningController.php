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
        // Récupération des données du formulaire$services = \App\Models\Service::withCount('users')->get();
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id', // Validation que le service existe
            'user_id' => 'required|exists:users,id', // Validation que l'utilisateur existe
            'planning_type' => 'required|string',
            'start_date' => 'required|date',
            'start_time' => 'nullable|integer|min:0|max:23', // Validation de l'heure de début
            'end_date' => 'nullable|date|after_or_equal:start_date', // Validation de la date de fin
            'end_time' => 'nullable|integer|min:0|max:23', // Validation de l'heure de fin
            'event_location' => 'nullable|string|max:255',
            'status' => 'required|in:en_attente,confirme,annule',
            'detail_planning' => 'nullable|string|max:500',
        ], [
            'service_id.required' => 'Le service est obligatoire.',
            'user_id.required' => 'Le personnel concerné est obligatoire.',
            'status.required' => 'Le statut est obligatoire.',
            'start_date.required' => 'La date de début est obligatoire.',
            'planning_type.required' => 'Le type de planification est obligatoire.',
            'end_date.after_or_equal' => 'La date de fin du planning doit être supérieure ou égale à la date de début u planning.',
        ]);

        if (isset($validatedData['start_date']) && isset($validatedData['end_date'])) {
            $startDate = \Carbon\Carbon::parse($validatedData['start_date']);
            $endDate = \Carbon\Carbon::parse($validatedData['end_date']);

            if ($endDate <= $startDate) {
                return redirect()->back()->withInput()->withErrors(['end_date' => 'La date de fin du planning doit être supérieure à la date de début du planning.']);
            }
        }
        // dd($request->all());

        try {
            // Création du planning
            Planning::create([
                'service_id' => $validatedData['service_id'],
                'user_id' => $validatedData['user_id'],
                'planning_type' => $validatedData['planning_type'],
                'start_date' => $validatedData['start_date'],
                'start_time' => $validatedData['start_time'] ?? null,
                'end_date' => $validatedData['end_date'] ?? null,
                'end_time' => $validatedData['end_time'] ?? null,
                'event_location' => $validatedData['event_location'],
                'status' => $validatedData['status'],
                'detail_planning' => $validatedData['detail_planning'],
                'created_by' => $userId,
            ]);

            // Message de succès
            Alert::success('Succès', 'Planning créé avec succès !');
            return redirect()->route('admin.planning.create'); // Redirection vers la création de planning
        } catch (\Throwable $e) {
            // En cas d'erreur
            Alert::error('Erreur', 'Une erreur s\'est produite lors de l\'ajout : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function list(){
        $users = User::latest('id')->get();
        $services = Service::latest('id')->get();
        $plannings = Planning::latest('id')->get();
        return view('admin.planning.list', compact('users', 'services','plannings'));
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

        // Récupérer tous les services
        $services = \App\Models\Service::all();

        // Récupérer tous les utilisateurs associés au service du planning
        $users = \App\Models\User::where('service_id', $planning->service_id)->get();

        // Passer les données à la vue en utilisant compact()
        return view('admin.planning.update', compact('planning', 'services', 'users'));
    }





    /**
     * Update the specified resource in storage.
     */
    // public function update_planning(Request $request, $id)
    // {
    //     $userId = Auth::id(); // Récupération de l'ID de l'utilisateur authentifié

    //     // Récupérer le planning à modifier
    //     $planning = Planning::find($id);

    //     // Si le planning n'existe pas, rediriger avec un message d'erreur
    //     if (!$planning) {
    //         Alert::error('Erreur', 'Le planning spécifié n\'existe pas.');
    //         return redirect()->route('admin.planning.index');
    //     }

    //     // Validation des données du formulaire
    //     $validatedData = $request->validate([
    //         'service_id' => 'required|exists:services,id', // Validation que le service existe
    //         'user_id' => 'required|exists:users,id', // Validation que l'utilisateur existe
    //         'planning_type' => 'required|string',
    //         'start_date' => 'required|date',
    //         'start_time' => 'nullable|integer|min:0|max:23', // Validation de l'heure de début
    //         'end_date' => 'nullable|date|after_or_equal:start_date', // Validation de la date de fin
    //         'end_time' => 'nullable|integer|min:0|max:23', // Validation de l'heure de fin
    //         'event_location' => 'nullable|string|max:255',
    //         'status' => 'required|in:en_attente,confirme,annule',
    //         'detail_planning' => 'nullable|string|max:500',
    //     ], [
    //         'service_id.required' => 'Le service est obligatoire.',
    //         'user_id.required' => 'Le personnel concerné est obligatoire.',
    //         'status.required' => 'Le statut est obligatoire.',
    //         'start_date.required' => 'La date de début est obligatoire.',
    //         'planning_type.required' => 'Le type de planification est obligatoire.',
    //         'end_date.after_or_equal' => 'La date de fin du planning doit être supérieure ou égale à la date de début du planning.',
    //     ]);

    //     if (isset($validatedData['start_date']) && isset($validatedData['end_date'])) {
    //         $startDate = \Carbon\Carbon::parse($validatedData['start_date']);
    //         $endDate = \Carbon\Carbon::parse($validatedData['end_date']);

    //         if ($endDate <= $startDate) {
    //             return redirect()->back()->withInput()->withErrors(['end_date' => 'La date de fin du planning doit être supérieure à la date de début du planning.']);
    //         }
    //     }

    //     try {
    //         // Mise à jour du planning
    //         $planning->update([
    //             'service_id' => $validatedData['service_id'],
    //             'user_id' => $validatedData['user_id'],
    //             'planning_type' => $validatedData['planning_type'],
    //             'start_date' => $validatedData['start_date'],
    //             'start_time' => $validatedData['start_time'] ?? null,
    //             'end_date' => $validatedData['end_date'] ?? null,
    //             'end_time' => $validatedData['end_time'] ?? null,
    //             'event_location' => $validatedData['event_location'],
    //             'status' => $validatedData['status'],
    //             'detail_planning' => $validatedData['detail_planning'],
    //             'updated_by' => $userId, // L'utilisateur qui a mis à jour le planning
    //         ]);

    //         // Message de succès
    //         Alert::success('Succès', 'Planning mis à jour avec succès !');
    //         return redirect()->route('admin.planning.index'); // Redirection vers la liste des plannings
    //     } catch (\Throwable $e) {
    //         // En cas d'erreur
    //         Alert::error('Erreur', 'Une erreur s\'est produite lors de la mise à jour : ' . $e->getMessage());
    //         return redirect()->back()->withInput();
    //     }
    // }

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