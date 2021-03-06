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
    	for($i = 0; $i < 100; $i++){
        $arr = $this->getAnggaran();
        $pembebanan = $arr['pembebanan'];
        $mata = $arr['mata'];
        $duit = $faker->numberBetween($min = 100000, $max = 50000000);
        $duit = round($duit, -3);
        $uid = $this->getID();

        $tanggal_dikeluarkan_surat = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
        $tambah_hari = rand(1,7);
        $tambah = date('Y/m/d',strtotime(date_format($tanggal_dikeluarkan_surat, "Y/m/d").' + '.$tambah_hari.' days'));
        $tanggal_harus_berangkat = $faker->dateTimeBetween($startDate = $tanggal_dikeluarkan_surat, $endDate = $tambah, $timezone = null);
        $tanggal_berangkat = $faker->dateTimeBetween($startDate = $tanggal_dikeluarkan_surat, $endDate = $tanggal_harus_berangkat, $timezone = null);

    		DB::table('waktu_perjalanan')->insert([
                'lama_perjalanan' => rand(1,5),
                'tanggal_berangkat' => $tanggal_berangkat,
                'tanggal_harus_berangkat' => $tanggal_harus_berangkat,
                'jumlah_hari_menginap' => rand(1,15),
                'tanggal_dikeluarkan_surat' =>$tanggal_dikeluarkan_surat,
                'updated_by'=>$uid
        ]);
        
        $waktu_id = DB::getPdo()->lastInsertId();
        
        DB::table('surat_perjalanan')->insert([
            'biaya_perjalanan' => $duit,
            'id_pembuat_komitmen' => $this->getPembuatKomitmen(),
            'id_kabupaten' => $this->getKabupaten(),
            'id_mata_anggaran' => $mata,
            'id_pembebanan_anggaran' =>  $pembebanan,
            'id_waktu_perjalanan' => $waktu_id,
            'id_kendaraan' => $this->getKendaraan(),
            'keterangan' => $faker->sentence($nbWords = 10, $variableNbWords = true), 
            'updated_by' => $uid
        ]);

        $sppd_id = DB::getPdo()->lastInsertId();
        $max = $faker->numberBetween($min = 1, $max = 3);

        for ($j=0; $j < $max; $j++) { 
          DB::table('pegawai_sppd')->insert([ 
            'id_pegawai' =>  $this->getPegawaiID(),
            'id_sppd' => $sppd_id,
            'updated_by' => $uid
          ]);
        }


      }
    }

    
    private function getPegawaiID() {
      $data = \App\Pegawai::inRandomOrder()->first();
      return $data->id;
    }

    private function getID() {
        $user = \App\User::inRandomOrder()->first();
        return $user->id;
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
