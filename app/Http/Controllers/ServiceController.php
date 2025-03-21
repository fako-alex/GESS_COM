<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{

    public function create(){
        return view('admin.services.create');
    }

    public function save(Request $request)
    {
        $userId = Auth::id(); // Récupération simplifiée de l'ID de l'utilisateur authentifié

        $validatedData = $request->validate([
            'name' => 'required|max:100',  // Nom du service
            'detail' => 'required|max:150', // Détail du service
        ], [
            'name.required' => 'Le nom du service est obligatoire.',
            'detail.required' => 'Le détail du service est obligatoire.',
        ]);
        $validatedData['added_by'] = $userId;


        try {
            // Création du service
            Service::create($validatedData);

            // Message de succès
            Alert::success('Succès', 'Service créé avec succès !');
            return redirect()->route('admin.services.create'); // Redirection vers la création d'un service
        } catch (\Throwable $e) {
            // En cas d'erreur, afficher une alerte et retourner les anciennes valeurs
            Alert::error('Erreur', 'Une erreur s\'est produite lors de l\'ajout : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


public function list(){

    $services = Service::all();
    return view('admin.services.list', compact('services'));
}

public function delete_services(Request $request, $id)
{
    // dd("Route atteinte avec l'ID : " . $id);
    $dervice = Service::findOrFail($id);

    if ($dervice) {
        $dervice->delete();
        Alert::success('Succès', 'Service supprimée avec succès !');
    } else {
        Alert::error('Erreur', 'Service non trouvée.');
    }

    return redirect()->route('admin.services.list');
}

public function edit_services(Request $request, $id){
    // dd($request->all());
    $service = Service::findOrFail($id);
    return view('admin.services.update',compact('service'));
}

public function update_services(Request $request, $id)
{
    try {
        // Récupérer le service à mettre à jour
        $service = Service::findOrFail($id);  // Trouve le service avec l'ID ou lance une exception si introuvable

        $userId = Auth::id();

        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'detail' => 'required|max:150',
        ], [
            'name.required' => 'Le nom du service est obligatoire.',
            'detail.required' => 'Le détail du service est obligatoire.',
        ]);

        // Ajouter l'ID de l'utilisateur authentifié
        $validatedData['added_by'] = $userId;

        // Mettre à jour le service
        $service->update($validatedData);

        // Message de succès
        Alert::success('Succès', 'Service mis à jour avec succès !');
        return redirect()->route('admin.services.list');  // Redirection vers la liste des services

    } catch (\Exception $e) {
        // Gestion des erreurs
        $errors = $e->getMessage();
        Alert::error('Erreur', 'Une erreur s\'est produite lors de la mise à jour: ' . $errors);
        return redirect()->back();  // Redirection vers la page précédente
    }
}

public function searchServices(Request $request)
{
    // Recherche les services qui correspondent à la requête
    $query = $request->input('q', '');

    $services = Service::where('name', 'LIKE', "%{$query}%")
                       ->limit(10)
                       ->get(['id', 'name']);

    return response()->json($services);
}


}
