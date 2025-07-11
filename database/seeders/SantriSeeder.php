<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;

class SantriSeeder extends Seeder
{
    public function run()
    {
        $santri = [
            ['nama_santri' => 'Ahmad Fauzan'],
            ['nama_santri' => 'Siti Aisyah'],
            ['nama_santri' => 'Muhammad Yusuf'],
            ['nama_santri' => 'Zahra Luthfi'],
            ['nama_santri' => 'Ali Ridwan'],
        ];

        Santri::insert($santri);
    }
}
