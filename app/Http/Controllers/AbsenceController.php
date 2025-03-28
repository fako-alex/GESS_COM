<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AbsenceController extends Controller
{
    public function create(){
        return view('admin.absences.create');
    }

    public function save(Request $request)
    {
        $userId = Auth::id(); // Récupération simplifiée de l'ID de l'utilisateur authentifié

        $validatedData = $request->validate([
            'name' => 'required|max:100',  // Motif d'absence du personnel
            'detail' => 'nullable|max:150', // Détail
        ], [
            'name.required' => 'Le champ raison de d\'absence est obligatoire',
            'end_date.after' => 'La date de fin doit être supérieure à la date de début.',
        ]);
        $validatedData['added_by'] = $userId;


        try {
            // Création de l'absence
            Absence::create($validatedData);

            // Message de succès
            Alert::success('Succès', 'Absence créé avec succès !');
            return redirect()->route('admin.absences.create');
        } catch (\Throwable $e) {
            // En cas d'erreur, afficher une alerte et retourner les anciennes valeurs
            Alert::error('Erreur', 'Une erreur s\'est produite lors de l\'ajout : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function list(){

        $absences = Absence::all();
        return view('admin.absences.list', compact('absences'));
    }

    public function delete_absences($id){
        $absence = Absence::find($id);
        $absence->delete();
        return redirect()->route('admin.absences.list');
    }
    public function edit_absences($id){
        $absence = Absence::find($id);
        return view('admin.absences.update', compact('absence'));
    }
    public function update_absences(Request $request, $id){
        $absence = Absence::find($id);
        $absence->name = $request->name;
        $absence->detail = $request->detail;
        $absence->save();
        return redirect()->route('admin.absences.list');
    }
}