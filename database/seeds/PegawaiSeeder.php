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

        for($i=0; $i<50; $i++){
            DB::table('pegawai')->insert([
                'nip' => $faker->randomNumber,
                'name_pegawai'  =>$faker->name,
                'pangkat' =>$faker->word,
                'jabatan' =>$faker->jobTitle,
                'instansi' =>$faker->company
            ]);
        }
    }
}
