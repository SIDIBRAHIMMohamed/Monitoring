<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\ModuleHistory; 

class ModuleHistoryController extends Controller
{
    // Affiche l'historique d'un module specifique
    public function show($moduleId)
    {
        $histories = ModuleHistory::where('module_id', $moduleId)->get();
        return view('histories.show', compact('histories'));
    }
}
