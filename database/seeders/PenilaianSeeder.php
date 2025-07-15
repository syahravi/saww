<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\Criteria;
use App\Models\Penilaian; // Make sure the Penilaian model exists

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all santri and criteria from the database
        $santri = Santri::orderBy('id')->get(); // Ensure santri are ordered consistently
        $criteria = Criteria::orderBy('id')->get(); // Ensure criteria are ordered consistently

        // Map criteria symbols to their IDs for easier lookup
        $criteriaMap = $criteria->keyBy('simbol');

        $dataPenilaian = [
            // S1 - ATIQOH KHAIRUNNISA
            ['santri_name' => 'ATIQOH KHAIRUNNISA', 'C1' => 90, 'C2' => 5, 'C3' => 85, 'C4' => 90, 'C5' => 90, 'C6' => 87, 'C7' => 70, 'C8' => 87, 'C9' => 70, 'C10' => 78],
            // S2 - ZAKI ABID
            ['santri_name' => 'ZAKI ABID', 'C1' => 80, 'C2' => 25, 'C3' => 75, 'C4' => 77, 'C5' => 70, 'C6' => 80, 'C7' => 85, 'C8' => 80, 'C9' => 75, 'C10' => 90],
            // S3 - ZALFA FAIRUZ
            ['santri_name' => 'ZALFA FAIRUZ', 'C1' => 95, 'C2' => 5, 'C3' => 90, 'C4' => 97, 'C5' => 87, 'C6' => 85, 'C7' => 75, 'C8' => 95, 'C9' => 89, 'C10' => 85],
            // S4 - AMANDA
            ['santri_name' => 'RANDIKA', 'C1' => 90, 'C2' => 15, 'C3' => 80, 'C4' => 89, 'C5' => 70, 'C6' => 75, 'C7' => 86, 'C8' => 90, 'C9' => 70, 'C10' => 89],
            // S5 - ATIQOH KHAIRUNNISA
            ['santri_name' => 'ZAHROH ZAHIDAH', 'C1' => 95, 'C2' => 5, 'C3' => 90, 'C4' => 100, 'C5' => 95, 'C6' => 90, 'C7' => 96, 'C8' => 95, 'C9' => 100, 'C10' => 98],
            // S6 - ANANDA ADITIYA
            ['santri_name' => 'ANANDA ADITIYA', 'C1' => 97, 'C2' => 5, 'C3' => 90, 'C4' => 96, 'C5' => 90, 'C6' => 89, 'C7' => 80, 'C8' => 85, 'C9' => 90, 'C10' => 90],
            // S7 - ZALDI
            ['santri_name' => 'ZALDI', 'C1' => 79, 'C2' => 10, 'C3' => 92, 'C4' => 85, 'C5' => 77, 'C6' => 89, 'C7' => 80, 'C8' => 85, 'C9' => 87, 'C10' => 89],
            // S8 - RANDIKA
            ['santri_name' => 'AMANDA', 'C1' => 85, 'C2' => 20, 'C3' => 80, 'C4' => 82, 'C5' => 70, 'C6' => 75, 'C7' => 70, 'C8' => 80, 'C9' => 75, 'C10' => 80],
            // S9 - ZAKI ABID
            ['santri_name' => 'AISYAH PUTRI KARTINA', 'C1' => 85, 'C2' => 10, 'C3' => 85, 'C4' => 95, 'C5' => 75, 'C6' => 90, 'C7' => 80, 'C8' => 90, 'C9' => 70, 'C10' => 80],
            // S10 - NAYLA
            ['santri_name' => 'NAYLA', 'C1' => 95, 'C2' => 10, 'C3' => 85, 'C4' => 90, 'C5' => 85, 'C6' => 80, 'C7' => 90, 'C8' => 85, 'C9' => 91, 'C10' => 90],
        ];

        foreach ($dataPenilaian as $penilaianSantri) {
            // Find the santri by name (assuming unique names)
            $currentSantri = $santri->firstWhere('nama_santri', $penilaianSantri['santri_name']);

            if ($currentSantri) {
                // Iterate through criteria to insert scores
                foreach ($penilaianSantri as $key => $value) {
                    if (str_starts_with($key, 'C') && isset($criteriaMap[$key])) {
                        Penilaian::create([
                            'santri_id' => $currentSantri->id,
                            'criteria_id' => $criteriaMap[$key]->id,
                            'nilai' => (int) $value, // Cast to integer to ensure whole numbers
                        ]);
                    }
                }
            } else {
                $this->command->warn("Santri '{$penilaianSantri['santri_name']}' not found. Skipping penilaian for this santri.");
            }
        }
    }
}
