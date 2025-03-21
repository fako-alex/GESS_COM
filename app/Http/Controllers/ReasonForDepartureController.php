<?php

namespace App\Http\Controllers;

use App\Models\ReasonForDeparture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReasonForDepartureController extends Controller
{

   public function create(){
    return view('admin.departures.create');
}

public function save(Request $request)
{
    $userId = Auth::id(); // Récupération simplifiée de l'ID de l'utilisateur authentifié

    $validatedData = $request->validate([
        'name' => 'required|max:100',  // Nom de la raison de départ
        'detail' => 'required|max:150', // Détail
    ], [
        'name.required' => 'Le champ raison de départ est obligatoire',
        'detail.required' => 'Le détail de la raison de départ est obligatoire.',
    ]);
    $validatedData['added_by'] = $userId;


    try {
        // Création du service
        ReasonForDeparture::create($validatedData);

        // Message de succès
        Alert::success('Succès', 'Raison créé avec succès !');
        return redirect()->route('admin.departures.create');
    } catch (\Throwable $e) {
        // En cas d'erreur, afficher une alerte et retourner les anciennes valeurs
        Alert::error('Erreur', 'Une erreur s\'est produite lors de l\'ajout : ' . $e->getMessage());
        return redirect()->back()->withInput();
    }
}


public function list(){

    $departures = ReasonForDeparture::all();
    return view('admin.departures.list', compact('departures'));
}

public function delete_departures(Request $request, $id)
{
    // dd("Route atteinte avec l'ID : " . $id);
    $departures = ReasonForDeparture::findOrFail($id);

    if ($departures) {
        $departures->delete();
        Alert::success('Succès', 'Raison supprimée avec succès !');
    } else {
        Alert::error('Erreur', 'Raison non trouvée.');
    }

    return redirect()->route('admin.departures.list');
}

public function edit_departures(Request $request, $id){
    // dd($request->all());
    $departures = ReasonForDeparture::findOrFail($id);
    return view('admin.departures.update',compact('departures'));
}

public function update_departures(Request $request, $id)
{
    try {
        // Récupérer le champ à mettre à jour
        $departures = ReasonForDeparture::findOrFail($id);  // Trouve la raison avec l'ID ou lance une exception si introuvable

        $userId = Auth::id();

        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'detail' => 'required|max:150',
        ], [
            'name.required' => 'Le champ raison de départ est obligatoire.',
            'detail.required' => 'Le détail  est obligatoire.',
        ]);

        // Ajouter l'ID de l'utilisateur authentifié
        $validatedData['added_by'] = $userId;

        // Mettre à jour le service
        $departures->update($validatedData);

        // Message de succès
        Alert::success('Succès', 'Champ mis à jour avec succès !');
        return redirect()->route('admin.departures.list');  // Redirection vers la liste des departures

        } catch (\Exception $e) {
            // Gestion des erreurs
            $errors = $e->getMessage();
            Alert::error('Erreur', 'Une erreur s\'est produite lors de la mise à jour: ' . $errors);
            return redirect()->back();  // Redirection vers la page précédente
        }
    }
}
