<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        DB::table('pegawai')->insert([
            'nip' => $faker->date($format = 'Ymd', $max = 'now').$faker->date($format = 'Ym', $max = 'now').$faker->numberBetween($min = 1, $max = 2).str_pad(0, 3, '0', STR_PAD_LEFT),
            'name_pegawai' =>$faker->name,
            'pangkat' => 'IVe',
            'jabatan' => 'Kepala Desa',
            'instansi' => 'Desa '.$faker->company,
            'updated_by'=>$this->getID()
        ]);

        for($i=1; $i<50; $i++){
            $nip = $faker->date($format = 'Ymd', $max = 'now').$faker->date($format = 'Ym', $max = 'now').$faker->numberBetween($min = 1, $max = 2).str_pad($i, 3, '0', STR_PAD_LEFT);
            $pangkat = $faker->randomElement($array = array ('I','II','III','IV')).$faker->randomElement($array = array ('a','b','c','d'));
            $jabatan = $faker->randomElement($array = array ('Pegawai','Sekretaris','Pelaksana','PBD','Kaur Pem','Kaur PBD','Kaur Peb','Kaur Kesra','Kaur Keuangan','Kaur Umum','Pelaksana Teknis','Pelaksana Wilayah','Pembantu Desa'));
            DB::table('pegawai')->insert([
                'nip' => $nip,
                'name_pegawai'  =>$faker->name,
                'pangkat' =>$pangkat,
                'jabatan' =>$jabatan,
                'instansi' =>$faker->company,
                'updated_by'=>$this->getID()
            ]);
        }
    }
    private function getID() {
      $user = \App\User::inRandomOrder()->first();
      return $user->id;
    }
}
