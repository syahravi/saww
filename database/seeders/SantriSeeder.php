<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $santri = [
            ['nama_santri' => 'Atiqoh Khairunnisa'],
            ['nama_santri' => 'Zaki Abid'],
            ['nama_santri' => 'Zalfa Fairuz'],
            ['nama_santri' => 'Randika'],
            ['nama_santri' => 'Zahroh Zahidah'],
            ['nama_santri' => 'Ananda Aditiya'],
            ['nama_santri' => 'Zaldi'],
            ['nama_santri' => 'Amanda'],
            ['nama_santri' => 'Aisyah Putri Kartina'],
            ['nama_santri' => 'Nayla'],
        ];

        Santri::insert($santri);
    }
}
