<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\Criteria;
use App\Models\Penilaian; // Pastikan model Penilaian sudah ada

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua santri dan kriteria yang sudah ada di database
        $santri = Santri::all();
        $criteria = Criteria::all();
        $dataPenilaian = [
            // S1
            ['santri_index' => 0, 'C1' => 90, 'C2' => 5, 'C3' => 85, 'C4' => 90, 'C5' => 90, 'C6' => 87, 'C7' => 70, 'C8' => 87, 'C9' => 70, 'C10' => 78],
            // S2
            ['santri_index' => 1, 'C1' => 80, 'C2' => 25, 'C3' => 75, 'C4' => 77, 'C5' => 70, 'C6' => 80, 'C7' => 85, 'C8' => 80, 'C9' => 75, 'C10' => 90],
            // S3
            ['santri_index' => 2, 'C1' => 95, 'C2' => 5, 'C3' => 90, 'C4' => 97, 'C5' => 87, 'C6' => 85, 'C7' => 75, 'C8' => 95, 'C9' => 89, 'C10' => 85],
            // S4
            ['santri_index' => 3, 'C1' => 90, 'C2' => 15, 'C3' => 80, 'C4' => 89, 'C5' => 70, 'C6' => 75, 'C7' => 86, 'C8' => 90, 'C9' => 70, 'C10' => 89],
            // S5
            ['santri_index' => 4, 'C1' => 95, 'C2' => 5, 'C3' => 90, 'C4' => 100, 'C5' => 95, 'C6' => 90, 'C7' => 96, 'C8' => 95, 'C9' => 100, 'C10' => 98],
            // S6
            ['santri_index' => 5, 'C1' => 97, 'C2' => 5, 'C3' => 90, 'C4' => 96, 'C5' => 90, 'C6' => 89, 'C7' => 80, 'C8' => 85, 'C9' => 90, 'C10' => 90],
            // S7
            ['santri_index' => 6, 'C1' => 79, 'C2' => 10, 'C3' => 92, 'C4' => 85, 'C5' => 77, 'C6' => 89, 'C7' => 80, 'C8' => 85, 'C9' => 87, 'C10' => 89],
            // S8
            ['santri_index' => 7, 'C1' => 85, 'C2' => 20, 'C3' => 80, 'C4' => 82, 'C5' => 70, 'C6' => 75, 'C7' => 70, 'C8' => 80, 'C9' => 75, 'C10' => 80],
            // S9
            ['santri_index' => 8, 'C1' => 85, 'C2' => 10, 'C3' => 85, 'C4' => 95, 'C5' => 75, 'C6' => 90, 'C7' => 80, 'C8' => 90, 'C9' => 70, 'C10' => 80],
            // S10
            ['santri_index' => 9, 'C1' => 95, 'C2' => 10, 'C3' => 85, 'C4' => 90, 'C5' => 85, 'C6' => 80, 'C7' => 90, 'C8' => 85, 'C9' => 91, 'C10' => 90],
        ];

        foreach ($dataPenilaian as $penilaianSantri) {
            $currentSantri = $santri[$penilaianSantri['santri_index']];

            foreach ($criteria as $kriteria) {
                $simbol = $kriteria->simbol; // e.g., 'C1', 'C2'
                if (isset($penilaianSantri[$simbol])) {
                    Penilaian::create([
                        'santri_id' => $currentSantri->id,
                        'criteria_id' => $kriteria->id,
                        'nilai' => $penilaianSantri[$simbol],
                    ]);
                }
            }
        }
    }
}
