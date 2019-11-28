<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class WaktuPerjalanan extends Seeder
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
                'updated_by'=>$this->getID()
    		]);
 
    	}
    }
    private function getID() {
      $user = \App\User::inRandomOrder()->first();
      return $user->id;
    }
}
