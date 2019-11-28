<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SuratPerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $faker = Faker::create('id_ID');
    	for($i = 0; $i < 1000; $i++){
        $arr = $this->getAnggaran();
        $pembebanan = $arr['pembebanan'];
        $mata = $arr['mata'];
        $duit = $faker->numberBetween($min = 100000, $max = 50000000);
        $duit = round($duit, -3);
        DB::table('surat_perjalanan')->insert([
            'biaya_perjalanan' => $duit,
            'id_pegawai' => $this->getPegawaiID(),
            'id_pembuat_komitmen' => $this->getPembuatKomitmen(),
            'id_kabupaten' => $this->getPegawaiID(),
            'id_mata_anggaran' => $mata,
            'id_pembebanan_anggaran' =>  $pembebanan,
            'id_waktu_perjalanan' => $this->getWaktu(),
            'id_kendaraan' => $this->getKendaraan(),
            'updated_by'=> $this->getID()
        ]);
      }
    }

    private function getID() {
        $user = \App\User::inRandomOrder()->first();
        return $user->id;
    }

    private function getPegawaiID() {
        $data = \App\Pegawai::inRandomOrder()->first();
        return $data->id;
    }
    private function getPembuatKomitmen() {
        $data = DB::table('pejabat_pembuat_komitmen')
                  ->inRandomOrder()
                  ->first();
        return $data->id;
    }
    private function getKabupaten() {
        $data = DB::table('kabupaten')
                  ->inRandomOrder()
                  ->first();
        return $data->id;
    }
    private function getWaktu() {
        $data = DB::table('waktu_perjalanan')
                  ->inRandomOrder()
                  ->first();
        return $data->id;
    }
    private function getKendaraan() {
        $data = DB::table('kendaraan')
                  ->inRandomOrder()
                  ->first();
        return $data->id;
    }
    private function getAnggaran() {
        $data = DB::table('pembebanan_anggaran')
                  ->inRandomOrder()
                  ->first();
                  
        $result = array();
        if ($data->kategori == "APBD DESA"){
          $desa = DB::table('mata_anggaran')
                  ->inRandomOrder()
                  ->first();
          $result['mata'] = $desa->id;
        }else {
          $result['mata'] = null;
        }
        $result['pembebanan'] = $data->id;

        return $result;
    }
}
