<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    public function run()
    {
        $criteria = [
            ['kriteria' => 'Kedisiplinan', 'simbol' => 'C1', 'bobot' => 0.3, 'type' => 'benefit'],
            ['kriteria' => 'Akhlak', 'simbol' => 'C2', 'bobot' => 0.25, 'type' => 'benefit'],
            ['kriteria' => 'Kecerdasan', 'simbol' => 'C3', 'bobot' => 0.2, 'type' => 'benefit'],
            ['kriteria' => 'Keterampilan', 'simbol' => 'C4', 'bobot' => 0.15, 'type' => 'benefit'],
            ['kriteria' => 'Kehadiran', 'simbol' => 'C5', 'bobot' => 0.1, 'type' => 'benefit'],
        ];

        Criteria::insert($criteria);
    }
}
