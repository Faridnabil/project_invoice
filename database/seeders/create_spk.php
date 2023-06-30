<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_spk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spk')->insert([
            'no' => 'SPK-001',
            'tgl' => '2023-06-20',
            'nama' => 'PT. GLOBAL TECH',
            'alamat' => 'Purwakarta',
            'telp' => '085903683912',
            'ktp' => 3214112512010001,
            'nama1' => 'PT. GEN-Z',
            'alamat1' => 'Purwakarta',
            'telp1' => "0859036839",
            'ktp1' => 3214112512010001,
            'quotation_id' => '',
            'created_at' => Carbon::now(),
        ]);
    }
}
