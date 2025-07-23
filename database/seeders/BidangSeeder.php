<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeder extends Seeder
{
    public function run()
    {
        $bidangs = [
            ['nama_bidang' => 'Lalu Lintas'],
            ['nama_bidang' => 'Intelkam (Intelijen dan Keamanan)'],
            ['nama_bidang' => 'Reserse Kriminal (Reskrim)'],
            ['nama_bidang' => 'Reserse Narkoba'],
            ['nama_bidang' => 'Pembinaan Masyarakat (Binmas)'],
            ['nama_bidang' => 'Samapta Bhayangkara (Sabhara)'],
            ['nama_bidang' => 'Profesi dan Pengamanan (Propam)'],
            ['nama_bidang' => 'Hubungan Masyarakat (Humas)'],
            ['nama_bidang' => 'Teknologi Informasi dan Komunikasi (TIK)'],
            ['nama_bidang' => 'Pelayanan Perempuan dan Anak (PPA)'],
        ];

        DB::table('bidangs')->insert($bidangs);
    }
}
