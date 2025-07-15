<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria = [
            ['kriteria' => 'Adab/Akhlaq', 'simbol' => 'C1', 'bobot' => 0.25, 'type' => 'Benefit'],
            ['kriteria' => 'Absensi Ubudiyah', 'simbol' => 'C2', 'bobot' => 0.1, 'type' => 'Benefit'],
            ['kriteria' => 'Absensi Kegiatan Belajar Mengajar (KBM)', 'simbol' => 'C3', 'bobot' => 0.1, 'type' => 'Benefit'],
            ['kriteria' => 'Hafalan', 'simbol' => 'C4', 'bobot' => 0.15, 'type' => 'Benefit'],
            ['kriteria' => 'Prestasi Akademik', 'simbol' => 'C5', 'bobot' => 0.1, 'type' => 'Benefit'],
            ['kriteria' => 'Kreatifitas', 'simbol' => 'C6', 'bobot' => 0.1, 'type' => 'Benefit'],
            ['kriteria' => 'Poin Pelanggaran Keamanan', 'simbol' => 'C7', 'bobot' => 0.05, 'type' => 'Cost'],
            ['kriteria' => 'Kejujuran', 'simbol' => 'C8', 'bobot' => 0.05, 'type' => 'Cost'],
            ['kriteria' => 'Kedisiplinan', 'simbol' => 'C9', 'bobot' => 0.05, 'type' => 'Cost'],
            ['kriteria' => 'Kepedulian', 'simbol' => 'C10', 'bobot' => 0.05, 'type' => 'Cost'],
        ];

        Criteria::insert($criteria);
    }
}
