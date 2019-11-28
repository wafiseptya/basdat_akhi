<?php

use Illuminate\Database\Seeder;

class PembebananAnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pembebanan_anggaran')->insert([
        [
            'kategori'=>'APBD DESA'
        ],
        [
            'kategori'=>'APBD Kabupaten'
        ],
        [
            'kategori'=>'Dan Lain-lain'
        ],
        ]);
    }
}
