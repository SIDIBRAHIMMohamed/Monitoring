<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\ModuleHistory; 
use Carbon\Carbon;

class ModuleController extends Controller
{
    // Affiche la liste des modules
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    // Affiche le formulaire pour Creer un nouveau module
    public function create()
    {
        return view('modules.create');
    }

    // Enregistre un nouveau module dans la base de donnees
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Module::create($request->only(['name', 'description']));

        return redirect()->route('modules.index')->with('success', 'Module created successfully.');
    }

    // Affiche les details d'un module specifique avec son historique
    public function show($moduleId)
    {
        // Recuperer le module
        $module = Module::findOrFail($moduleId);
        
        // Recuperer l'historique du module
        $histories = ModuleHistory::where('Id_Module', $moduleId)->get();
        
        // Calculer la valeur mesurée actuelle
        $latestHistory = $histories->last();
        $currentValue = $latestHistory ? $latestHistory->value : null;

        // Calculer le nombre de données envoyées
        $numberOfDataSent = $histories->count();

        // Calculer la duree de fonctionnement
        $updateAt = Carbon::parse($module->updated_at);
        $operatingDuration = $updateAt->diffForHumans(null, true);

        // Passer les donnees a la vue
        return view('modules.show', compact('module', 'histories', 'currentValue', 'numberOfDataSent', 'operatingDuration'));
    }

    // Affiche le formulaire pour modifier un module existant
    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }

    // Met a jour un module existant dans la base de donnees
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $module->update($request->only(['name', 'description']));

        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    // Supprime un module de la base de donnees
    public function destroy(Module $module)
    {
        // Supprimer les enregistrements enfants de la table module_histories
        $module->moduleHistories()->delete();
    
        // Supprimer le module
        $module->delete();
    
        return redirect()->route('modules.index')->with('success', 'Module deleted successfully.');
    }

    public function confirmDelete(Module $module)
    {
        return view('modules.confirm-delete', compact('module'));
    }


}
