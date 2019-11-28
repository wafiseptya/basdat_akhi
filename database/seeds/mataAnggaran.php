<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class mataAnggaran extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $mata_anggaran = ['sosialisasi','pendidikan','kesehatan','kebersihan','kebudayaan',];

    	for($i = 0; $i <count($mata_anggaran); $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('mata_anggaran')->insert([
                'jenis' => $mata_anggaran[$i],
                'created_at' => now(),
                'updated_at' => now(),
                
    		]);
 
    	}
 
    }
}