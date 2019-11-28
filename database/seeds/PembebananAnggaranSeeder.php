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
            'kategori'=>'APBD DESA',
            'updated_by'=>$this->getID()
        ],
        [
            'kategori'=>'APBD Kabupaten',
            'updated_by'=>$this->getID()
        ],
        [
            'kategori'=>'Dan Lain-lain',
            'updated_by'=>$this->getID()
        ],
        ]);
    }
    private function getID() {
      $user = \App\User::inRandomOrder()->first();
      return $user->id;
    }
}
