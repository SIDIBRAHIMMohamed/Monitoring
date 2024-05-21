<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Module;
use App\Models\ModuleHistory;
use Illuminate\Support\Facades\Log; 

class GenerateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate random data for modules';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Recuperer tous les modules
        $modules = Module::all();
    
        foreach ($modules as $module) {
            // Generer un nombre aleatoire entre 0 et 1 pour le statut
            $status = mt_rand(0, 1);
    
            // Mettre a  jour le statut du module
            $module->update(['status' => $status]);
    
            // Creer un enregistrement dans l'historique du module seulement si le statut est 1
            if ($status) {
                ModuleHistory::create([
                    'Id_Module' => $module->Id_Module,
                    'value' => mt_rand(0, 100), // Generer une valeur aléatoire
                ]);
            }
        }
    
        $this->info('Data generated successfully.');
    }
    
    
}
