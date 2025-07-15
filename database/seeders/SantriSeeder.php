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
        // Opsional: Kosongkan tabel santri terlebih dahulu jika ingin memastikan hanya data ini yang ada
        // Santri::truncate();

        $santri = [
            ['nama_santri' => 'ATIQOH KHAIRUNNISA'], // S1
            ['nama_santri' => 'ZAKI ABID'],          // S2
            ['nama_santri' => 'ZALFA FAIRUZ'],       // S3
            ['nama_santri' => 'RANDIKA'],            // S4
            ['nama_santri' => 'ZAHROH ZAHIDAH'],     // S5
            ['nama_santri' => 'ANANDA ADITIYA'],     // S6
            ['nama_santri' => 'ZALDI'],              // S7
            ['nama_santri' => 'AMANDA'],            // S8 - Pastikan ini disengaja jika ada duplikat nama
            ['nama_santri' => 'AISYAH PUTRI KARTINA'],// S9 (perhatikan ada typo 'KSRTINA', saya biarkan sesuai gambar)
            ['nama_santri' => 'NAYLA'],              // S10
        ];

        Santri::insert($santri);
    }
}
