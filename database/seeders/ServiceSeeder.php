<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            ['name' => 'SOLARSYS ENERGY', 'slug' => 'solarsys-energy', 'icon' => '🌞'],
            ['name' => 'AGROSYS FARM FRESH', 'slug' => 'agrosys-farm-fresh', 'icon' => '🌾'],
            ['name' => 'GSPV NEW ENERGY BD', 'slug' => 'gspv-new-energy-bd', 'icon' => '⚡'],
            ['name' => 'SYS Express', 'slug' => 'sys-express', 'icon' => '🚚'],
            ['name' => 'INSYS INTERNATIONAL', 'slug' => 'insys-international', 'icon' => '🌍'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

