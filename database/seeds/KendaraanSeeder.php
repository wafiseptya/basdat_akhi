<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $kendaraan = ['Pesawat','Mobil','Sepeda Motor', 'Kapal', 'Bus', 'Kereta Api'];
        
    	for($i = 0; $i < count($kendaraan); $i++){
    		DB::table('kendaraan')->insert([
    			'jenis' => $kendaraan[$i],
          'updated_by'=>$this->getID()
    		]);
    	}
    }
    private function getID() {
      $user = \App\User::inRandomOrder()->first();
      return $user->id;
    }
}
