<?php

use Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\ModuleHistory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 modules
        $modules = Module::factory(5)->create();

        // Create 50 module histories for each module
        foreach ($modules as $module) {
            ModuleHistory::factory(50)->create(['Id_Module' => $module->Id_Module]);
        }
    }
}

