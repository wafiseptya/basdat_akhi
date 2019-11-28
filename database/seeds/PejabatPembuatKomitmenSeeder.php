<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PejabatPembuatKomitmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
    	for($i = 0; $i < 1; $i++){
    		DB::table('pejabat_pembuat_komitmen')->insert([
    			'pegawai_id' => $this->getPegawaiID(),
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
}
