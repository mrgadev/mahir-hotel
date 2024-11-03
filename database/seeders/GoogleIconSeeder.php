<?php

namespace Database\Seeders;

use App\Models\GoogleIcons;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoogleIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoogleIcons::truncate();
        $csvFile = fopen(base_path("database/data/MaterialIcons.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
        if (!$firstline) {
        GoogleIcons::create([
        "name" => $data['0'],
        "entity" => $data['1']
        ]);
        }
        $firstline = false;
        }
        fclose($csvFile);
        }
}
