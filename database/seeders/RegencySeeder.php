<?php

namespace Database\Seeders;

use App\Models\Regency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Regency::truncate();
        $csvFile = fopen(base_path("database/data/regencies.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        if (!$firstline) {
        Regency::create([
        "name" => $data['0'],
        ]);
        }
        $firstline = false;
        }
        fclose($csvFile);
        }
    
}
